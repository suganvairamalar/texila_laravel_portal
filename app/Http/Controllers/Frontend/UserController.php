<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Hash;
use App\User;
use App\JobLocation;

class UserController extends Controller
{
    public function myprofile(){
        $job_locations = JobLocation::all();
        return view('frontend.user.myprofile',compact('job_locations'));
    }

     public function my_profile_update(Request $request){
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->experience = $request->input('experience');
        $user->notice_period = $request->input('notice_period');
        $user->skills = $request->input('skills');
        $user->job_location_id = $request->input('job_location_id');
            
        //$user->profile_image = $request->input('profile_image');
        
        if($request->hasfile('photo')){
            $destination = 'uploads/profile_image/'.$user->photo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();//use to name
            $filename = time().".".$extension; //use to avoid repeat name
            $file->move('uploads/profile_image/',$filename);
            $user->photo = $filename;
        }

         if($request->hasfile('resume')){
            $destination = 'uploads/resume/'.$user->resume;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('resume');
            $extension = $file->getClientOriginalExtension();//use to name
            $filename = time().".".$extension; //use to avoid repeat name
            $file->move('uploads/resume/',$filename);
            $user->resume = $filename;
        }
        $user->update();
        return redirect()->back()->with('status','Profile Updated');
    }

    public function changePassword(){
        return view('frontend.user.changepassword');
    }

    public function changePasswordupdate(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("status","Password changed successfully !");

    }
}
