<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $data = array();
        $posts = DB::table('posts')
        ->select('*')
        ->orderBy('updated_at', 'desc')
        ->where('status','publish')
        ->get();

        foreach($posts as $post){

            $userData = DB::table('users')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->select('profiles.*', 'users.name', 'users.email')
            ->where('users.id','=',$post->author)
            ->get();

            $limitedText = Str::limit(html_entity_decode(strip_tags($post->content)), 200, ' (...)');
            array_push($data, (object) ['post'=> $post, 'limitedText'=> $limitedText, 'author_data' => $userData[0]]);
        }

        return view('post.list',['data'=> $data]);
    }

    public function list_type($type){
        
        return $type;
    }

    public function create_get(Request $request){
        $backUrl = '';
        if($request['page'] && $request['page'] == 'profile' ){
           $backUrl = '/profile';
        }else{
            $backUrl = '/home';
        }

        return view('post.create', ['backurl'=> $backUrl]);
    } 

    public function create_put(Request $request){
        $user = Auth::user();
        $image_url = "";

        //return dd($request);

        $insertedId = DB::table('posts')->insertGetId(
            [
                'title' => $request['title'],
                'content' => $request['content'],
                'author' => $user->id,
                'thumbnail_url' => $image_url,
                'type' => 'post',
                'status' => 'publish',
            ]
        );

        if ($insertedId && $request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'post-'.time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/posts'), $imageName);

            $image_url = "/uploads/posts/". $imageName;

            DB::table('posts')
            ->where('id', $insertedId)
            ->update([
                'thumbnail_url' => $image_url,
            ]);           
        }

        return redirect('/post/'.$insertedId);

    }

    public function edit_get($post_id){

        $user = Auth::user();

        $posts = DB::table('posts')
        ->select('*')
        ->where('id','=',$post_id)
        ->get();

        if($posts[0]->author != $user->id){
            return 'Sorry!, you dont have access to edit this page.';
        }

        return view('post.edit',['post'=>$posts[0]]);
    }
    public function edit_put($post_id ,Request $request){
        $image_url = $request['current_image'];
           
        
        if ($post_id && $request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'post-'.time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/posts'), $imageName);

            $image_url = "/uploads/posts/". $imageName;
        }

        DB::table('posts')
        ->where('id', $post_id)
        ->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'thumbnail_url' => $image_url,
            'type' => 'post',
            'status' => ($request['status'] ? 'publish' : 'unpublish'),
        ]);      
        
        return redirect('/post/'.$post_id);
    
    }

    public function single($post_id){
        $user = Auth::user();
        
        $data = DB::table('posts')
        ->select('*')
        ->where('id', '=', $post_id)
        ->get();

        if(!$data->isEmpty()){

            $dateTimeString = $data[0]->created_at; // Replace this with your date and time string

            $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $dateTimeString);

            $formattedDate = $dateTime->format('F j, Y');

            return view('post.single', ['post' => $data[0], 'post_formateddate' => $formattedDate, 'user'=>$user]);
        }else {
            return response('post not found');
        }
       
    }

    public function delete($post_id){

        return print_r($post_id);

        $deletedRows = DB::table('posts')->where('id', '=', $post_id)->delete();

        return "Deleted $deletedRows row(s)";   
    }
}
