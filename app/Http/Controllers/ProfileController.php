<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct(){}
    public function index(){
        
        $user = Auth::user();

        $user_data = DB::select('SELECT * FROM users WHERE id="'. $user->id .'"');
        $profile_data = DB::select('SELECT * FROM profiles WHERE user_id="'. $user->id .'"');

        //return "profile index user ". print_r($data);
        return view('profile.index', ['user_data' => $user_data, 'profile_data' => $profile_data]);
    }

    public function edit(Profile $profile){

        //return view('profile.edit');
        $user = Auth::user();

        $user_data = DB::select('SELECT * FROM users WHERE id="'. $user->id .'"');
        $profile_data = DB::select('SELECT * FROM profiles WHERE user_id="'. $user->id .'"');


        return view('profile.edit', ['user_data' => $user_data, 'profile_data' => $profile_data]);
    }

    public function update(Request $request){

        $user = Auth::user();


        // // $this->employeeRepository->update($request->all(), $employee);
        // // return redirect()->route('employees.show', ['employee' => $employee->id]);

        if($request["phone"] || $request["about_me"]){
            DB::select('UPDATE profiles 
            SET phone = "'. $request["phone"] .'",
            about_me = "'. $request["about_me"] .'"
            WHERE user_id="'. $user->id .'"');
        }

        return redirect()->route('profile.index');
    
    }

    
}
