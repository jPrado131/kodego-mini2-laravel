<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationApiController extends Controller
{
    public function index()
    {
        return User::all();
    }

    
    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request, User $user)
    {   

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return response(
            [
                'message' => 'User successfully created',
                'user' => $user,
                'id' => $user->id
            ],
            201
        );
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response([
            'message' => 'User successfully updated',
            'user' => $user,
            'id' => $user->id
        ]);
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);

        return response([
            'message' => 'User successfully deleted'
        ]);
    }


    public function login(Request $request)
    {
        $validated = $request->validate(
            [
                'email' => 'required|string|',
                'password' => 'required|string|'
            ]
        );

        $user = User::where('email', $validated['email'])->first();
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response(
                [
                    'message' => "Bad Credential"
                ],
                401
            );
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return  response(
            [
                'user' => $user,
                'token' => $token
            ],
            200
        );
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response(['message' => 'log out successfully']);
    }
}
