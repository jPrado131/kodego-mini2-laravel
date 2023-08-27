<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class RealTimeChat extends Component
{


    public $messages = [];

    public function mount()
    {
        $this->messages = Post::latest()->get(); // Fetch initial data
    }

    public function render()
    {
        return view('livewire.real-time-chat');
    }

    public function fetchNewData()
    {   
        $latestMessageId = isset($this->messages[0]) ? $this->messages[0]->id : null;
        
        $newMessages = Post::where('id', '>', $latestMessageId)->get();

        if ($newMessages->count() > 0) {
            $this->messages = $newMessages->merge($this->messages);
        }
    }
}
