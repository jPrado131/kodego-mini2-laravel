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

        $user_data = DB::table('users')
        ->select('*')
        ->where('id', '=', $user->id)
        ->get();

        $profile_data = DB::table('profiles')
        ->select('*')
        ->where('user_id', '=', $user->id)
        ->get();

        return view('profile.index', ['user_data' => $user_data, 'profile_data' => $profile_data]);
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

    
}
