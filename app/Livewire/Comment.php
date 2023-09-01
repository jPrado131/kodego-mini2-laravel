<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Comment extends Component
{    
    public $comment = '';
    public $comment_data = '';
    public $post;
    public $user;



    public function mount()
    {
        $this->comment_data = $this->get_comments();

        $userData = DB::table('users')
        ->join('profiles', 'profiles.user_id', '=', 'users.id')
        ->select('profiles.*', 'users.name', 'users.email')
        ->where('users.id', '=', Auth::user()->id)
        ->get();   

        $this->user = $userData[0];  
    }

    public function get_comments()
    {
        return(DB::table('comments')
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->join('profiles', 'profiles.user_id', '=', 'comments.user_id')
        ->select('*', DB::raw('comments.created_at AS comment_date'))
        ->orderBy('comments.created_at', 'ASC')
        ->where('post_id', '=', $this->post->id)
        ->get());
    }

    public function save()
    {

        DB::table('comments')->insert(
            [
                'post_id' => $this->post->id,
                'user_id' => $this->user->id,
                'comment' => $this->comment,
                'type' => $this->post->type,
            ]
        );
       
        $this->comment = '';
        $this->comment_data = $this->get_comments(); 
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
