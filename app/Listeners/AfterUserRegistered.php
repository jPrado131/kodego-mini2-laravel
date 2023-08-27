<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class AfterUserRegistered
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        // Get the registered user
        $user = $event->user;

        DB::table('profiles')->insert([
            'user_id' => $user->id,
            'first_name' => '',
            'last_name' => '',
            'phone' => '',
            'about_me' => '',
            'thumbnail' => '/images/dont-delete/default/default-pro-pic.jpg',
        ]); 
        
    }
}
