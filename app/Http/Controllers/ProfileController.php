<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfileController extends Controller
{

    public function __construct(){}

    public function index(Request $request){

        $user_id = Auth::user()->id;
        $view_only = false;

        if($request['id']){
            $user_id = $request['id'];
            $view_only = true;
        }
        $data = array();

        $user_data = DB::table('users')
        ->select('*')
        ->where('id', '=', $user_id)
        ->get();

        $profile_data = DB::table('profiles')
        ->select('*')
        ->where('user_id', '=', $user_id)
        ->get();

        $posts = DB::table('posts')
        ->select('*')
        ->orderBy('id', 'desc')
        ->where('author', $user_id)
        ->get();


        foreach($posts as $post){

            $author_userData = DB::table('users')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->select('profiles.*', 'users.name', 'users.email')
            ->where('users.id', '=', $post->author)
            ->get();  

            $comments = DB::table('comments')
            ->select('*')
            ->where('post_id', $post->id)
            ->get();

            $heart_post = DB::table('heart_post')
                ->select('*')
                ->where('post_id', $post->id)
                ->where('status', true)
                ->get();
            
            $postedTime = $this->timeAgo(strtotime($post->created_at));
            $limitedText = Str::limit(html_entity_decode(strip_tags($post->content)), 200, ' (...)');
            
            array_push($data, (object) [
                'post'=> $post,
                'posted_time' => $postedTime,  
                'limitedText'=> $limitedText,
                'author_data' => $author_userData[0],
                'hear_post_count' => !$heart_post->isEmpty() ? count($heart_post) : 0,
                'comment_count' => !$comments->isEmpty() ? count($comments) : 0,
            ]);
        }
      
        return view('profile.index', [
            'view_only' => $view_only,
            'user_data' => $user_data,
            'profile_data' => $profile_data,
            'posts' => $data
            ]);
    }

    public function edit(){

        $user = Auth::user();

        $user_data = DB::table('users')
        ->select('*')
        ->where('id', '=', $user->id)
        ->get();

        $profile_data = DB::table('profiles')
        ->select('*')
        ->where('user_id', '=', $user->id)
        ->get();
        

        return view('profile.edit', ['user_data' => $user_data, 'profile_data' => $profile_data]);
    }

    public function update(Request $request){

        $user = Auth::user();

        DB::table('profiles')
        ->where('user_id', $user->id)
        ->update([
            'first_name' => $request["first_name"],
            'last_name' => $request["last_name"],
            'about_me' => $request["about_me"],
            'phone' => $request["phone"]
        ]);
        
        DB::table('users')
        ->where('id', $user->id)
        ->update([
            'name' => $request["name"],
        ]);

        return redirect()->route('profile.index');
    
    }

    public function upload_pro_pic(Request $request){

        $user = Auth::user();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile'), $imageName);

            $image_url = "/uploads/profile/". $imageName;

            DB::table('profiles')
            ->where('user_id', $user->id)
            ->update([
                'thumbnail' => $image_url,
            ]);
           
            return redirect()->route('profile.edit');
        }

        return redirect()->back()->with('error', 'No image file uploaded.');

    }

    public function index_pro_pic(){
        return view('profile.upload');
    } 

    public function timeAgo($timestamp) {
        $currentTimestamp = time();
        $timeDiff = $currentTimestamp - $timestamp;
    
        if ($timeDiff < 60) {
            return "1 minute ago";
        } elseif ($timeDiff < 3600) {
            $minutes = floor($timeDiff / 60);
            return $minutes . " minutes ago";
        } elseif ($timeDiff < 86400) {
            $hours = floor($timeDiff / 3600);
            return $hours . " hours ago";
        } else {
            $days = floor($timeDiff / 86400);
            return $days . " days ago";
        }
    }
    
}
