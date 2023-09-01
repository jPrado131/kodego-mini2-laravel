<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('post.list', ['data' => $this->rende_post_lists('index')]);
    }


    public function list_event()
    {
        return view('post.list', ['data' => $this->rende_post_lists('event')]);
    }

    public function list_announcements()
    {
        return view('post.list', ['data' => $this->rende_post_lists('announcement')]);
    }

    public function rende_post_lists($type)
    {

        $user = Auth::user();

        $data = array();

        if ($type == 'event') {
            $posts = DB::table('posts')
                ->select('*')
                ->orderBy('updated_at', 'desc')
                ->where('status', 'publish')
                ->where('type', 'event')
                ->get();
        } elseif ($type == 'announcement') {
            $posts = DB::table('posts')
                ->select('*')
                ->orderBy('updated_at', 'desc')
                ->where('status', 'publish')
                ->where('type', 'announcement')
                ->get();
        } else {
            $posts = DB::table('posts')
                ->select('*')
                ->orderBy('updated_at', 'desc')
                ->where('status', 'publish')
                ->get();
        }


        foreach ($posts as $post) {

            $userData = DB::table('users')
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

            $heart_post_default = DB::table('heart_post')
                ->select('*')
                ->where('post_id', $post->id)
                ->where('user_id', $user->id)
                ->get();

            $limitedText = Str::limit(html_entity_decode(strip_tags($post->content)), 200, ' (...)');
            $postedTime = $this->timeAgo(strtotime($post->created_at));

            array_push($data, (object) [
                'post' => $post,
                'posted_time' => $postedTime,
                'limited_text' => $limitedText,
                'hear_post_count' => !$heart_post->isEmpty() ? count($heart_post) : 0,
                'heart_post_default' => !$heart_post_default->isEmpty() ? $heart_post_default[0]->status : false,
                'comment_count' => !$comments->isEmpty() ? count($comments) : 0,
                'author_data' => $userData[0]
            ]);
        }

        return $data;
    }


    public function list_type($type)
    {

        return $type;
    }

    public function create_get(Request $request)
    {
        $user = Auth::user();
        $backUrl = '';

        $userData = DB::table('users')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->select('profiles.*', 'users.name', 'users.email')
            ->where('users.id', '=', $user->id)
            ->get();

        if ($request['page'] && $request['page'] == 'profile') {
            $backUrl = '/profile';
        } else {
            $backUrl = '/home';
        }

        return view('post.create', ['backurl' => $backUrl, 'user' => $userData[0]]);
    }

    public function create_put(Request $request)
    {
        $user = Auth::user();
        $image_url = "";
        $type = $request['type'] ? $request['type'] : 'post';

        $insertedId = DB::table('posts')->insertGetId(
            [
                'title' => $request['title'] ? $request['title'] : $request['title'],
                'content' => $request['content'] ? $request['content'] : '',
                'author' => $user->id,
                'thumbnail_url' => $image_url,
                'type' => $type,
                'status' => 'publish',
            ]
        );

        if ($insertedId && $request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'post-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/posts'), $imageName);

            $image_url = "/uploads/posts/" . $imageName;

            DB::table('posts')
                ->where('id', $insertedId)
                ->update([
                    'thumbnail_url' => $image_url,
                ]);
        }

        return redirect('/post/' . $insertedId);
    }

    public function edit_get($post_id)
    {

        $user = Auth::user();

        $posts = DB::table('posts')
            ->select('*')
            ->where('id', '=', $post_id)
            ->get();

        if ($posts[0]->author != $user->id) {
            return 'Sorry!, you dont have access to edit this page.';
        }

        return view('post.edit', ['post' => $posts[0]]);
    }

    public function edit_put($post_id, Request $request)
    {
        $image_url = $request['current_image'];

        if ($post_id && $request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'post-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/posts'), $imageName);

            $image_url = "/uploads/posts/" . $imageName;
        }

        DB::table('posts')
            ->where('id', $post_id)
            ->update([
                'title' => $request['title'] ? $request['title'] : '',
                'content' => $request['content'] ? $request['content'] : '',
                'thumbnail_url' => $image_url,
                'type' => 'post',
                'status' => ($request['status'] ? 'publish' : 'unpublish'),
            ]);

        return redirect('/post/' . $post_id);
    }

    public function single($post_id, Request $request)
    {
        $user = Auth::user();

        $post = DB::table('posts')
            ->select('*')
            ->where('id', '=', $post_id)
            ->get();


        if (!$post->isEmpty()) {

            $userData = DB::table('users')
                ->join('profiles', 'profiles.user_id', '=', 'users.id')
                ->select('profiles.*', 'users.name', 'users.email')
                ->where('users.id', '=', $post[0]->author)
                ->get();   

            $postedTime = $this->timeAgo(strtotime($post[0]->created_at));

            $heart_post_default = DB::table('heart_post')
            ->select('*')
            ->where('post_id', $post[0]->id)
            ->where('user_id', $user->id)
            ->get();

            $comments = DB::table('comments')
            ->select('*')
            ->where('post_id', $post[0]->id)
            ->get();

            $heart_post = DB::table('heart_post')
                ->select('*')
                ->where('post_id', $post[0]->id)
                ->where('status', true)
                ->get();


            return view('post.single', [
                'post' => $post[0], 
                'posted_time' => $postedTime, 
                'user' => $user,
                'author_data' => $userData[0],
                'heart_post_default' => !$heart_post_default->isEmpty() ? $heart_post_default[0]->status : false,
                'hear_post_count' => !$heart_post->isEmpty() ? count($heart_post) : 0,
                'comment_count' => !$comments->isEmpty() ? count($comments) : 0,
            ]);
 
        } else {
            return response('post not found');
        }
    }

    public function delete($post_id)
    {
        DB::table('posts')->where('id', '=', $post_id)->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully.');
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
