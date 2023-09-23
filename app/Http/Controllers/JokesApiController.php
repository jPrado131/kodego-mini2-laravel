<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JokesApiController extends Controller
{
    public function index()
    {
        return Joke::all();
    }

    
    public function show(Joke $joke)
    {   
        return $joke;
    }

    public function show_my_jokes($user)
    {   
        $jokeData = DB::table('jokes')
        ->join('joke_users', 'joke_users.joke_id', '=', 'jokes.id')
        ->select('*')
        ->where('joke_users.user', '=', $user)
        ->orderBy('jokes.id','DESC')
        ->get();

        return $jokeData;
    }

    public function store(Request $request)
    {   

        $insertedId = DB::table('jokes')->insertGetId(
            [
                'content' => $request['content'] ? $request['content'] : '',
                'generated_by' => $request['generated_by'] ? $request['generated_by'] : 0,
            ]
        );
        
        if ($insertedId) {
            DB::table('joke_users')->insert(
                [
                    'user' => $request['generated_by'] ? $request['generated_by'] : '',
                    'joke_id' => $insertedId,
                ]
            );

            return response(
                [
                    'message' => 'Joke successfully created',
                    'user' => $request['generated_by'],
                    'id' => $insertedId
                ],
                201
            );

        }
    }
}
