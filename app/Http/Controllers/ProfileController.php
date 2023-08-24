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

    public function edit(){

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
            SET first_name = "'. $request["first_name"] .'",
            last_name = "'. $request["last_name"] .'",
            about_me = "'. $request["about_me"] .'",
            phone = "'. $request["phone"] .'"
            WHERE user_id="'. $user->id .'"');
        }

        return redirect()->route('profile.index');
    
    }

    public function upload_pro_pic(Request $request){

        $user = Auth::user();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);

            $image_url = "/uploads/". $imageName;

            DB::select('UPDATE profiles 
            SET thumbnail = "' . $image_url .'"
            WHERE user_id="'. $user->id .'"');
            
            return redirect()->route('profile.edit');
        }

        return redirect()->back()->with('error', 'No image file uploaded.');

    }

    public function index_pro_pic(){
        return view('profile.upload');
    } 

    
}
