<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HeartPost extends Component
{   

    public $heart;
    public $post;
    public $default;

    public function mount() {
        
        $this->heart = $this->default;   
    
    }

    public function toggle_heart()
    {      

        $user = Auth::user();

        $heart_post_exist = DB::table('heart_post')
        ->select('*')
        ->where('post_id',$this->post->id)
        ->where('user_id',$user->id)
        ->get();

        if($this->heart === true){
            
            if(!$heart_post_exist->isEmpty()){
                DB::table('heart_post')
                ->where('id', $heart_post_exist[0]->id)
                ->update([
                    'status' => false,
                ]);    
            }
            $this->heart = false;

        }else {

            if(!$heart_post_exist->isEmpty()){
                DB::table('heart_post')
                ->where('id', $heart_post_exist[0]->id)
                ->update([
                    'status' => true,
                ]);    
            }else{
                DB::table('heart_post')->insert(
                    [
                        'post_id' => $this->post->id,
                        'user_id' => $user->id,
                        'status' => true,
                    ]
                );
            }

            $this->heart = true;
        }
    }

    public function render()
    {
        return view('livewire.heart-post');
    }
}
