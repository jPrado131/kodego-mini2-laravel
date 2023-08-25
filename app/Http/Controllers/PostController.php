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
        ->orderBy('id', 'desc')
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

    public function create_get(){
        return view('post.create');
    }

    public function create_put(Request $request){
        $user = Auth::user();

        //return dd($request);

        $insertedId = DB::table('posts')->insertGetId(
            [
                'title' => $request['title'],
                'content' => $request['content'],
                'author' => $user->id,
                'thumbnail_url' => '',
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

    public function single($post_id){
        
        $data = DB::table('posts')
        ->select('*')
        ->where('id', '=', $post_id)
        ->get();

        if(!$data->isEmpty()){

            $dateTimeString = $data[0]->created_at; // Replace this with your date and time string

            $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $dateTimeString);

            $formattedDate = $dateTime->format('F j, Y');

            return view('post.single', ['post' => $data[0], 'post_formateddate' => $formattedDate]);
        }else {
            return response('post not found');
        }
       
    }
}
