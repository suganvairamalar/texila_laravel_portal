<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\JobLocation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showRegistrationForm()
    {
        $job_locations = JobLocation::all();
        return view('auth.register',compact('job_locations'));
    }

    
    /* below code is not work in user registration page..u have to give the code like above 
    and its important "showRegistrationForm()"
    public function showcity()
    {
        //$job_locations = JobLocation::all()->pluck('job_location_name', 'id');

        $job_locations = JobLocation::get(["job_location_name","id"]); // get all cities
         return view('auth.register', [ 'job_locations' => $job_locations]);
        //return view('auth.register');
    }*/

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo' => ['required','mimes:jpeg,png,bmp,jpg,gif'],
            'resume' => ['required','mimes:pdf,docx,doc'],            
        ]);
    }

    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $request = request();
        if($request->hasfile('photo')){
            $profile_image_file = $request->file('photo');
            $profile_image_extension = $profile_image_file->getClientOriginalExtension();
            $profile_image_filename = time().".".$profile_image_extension;
            $profile_image_file->move('uploads/profile_image/',$profile_image_filename);
            }

        if($request->hasfile('resume')){
            $resume_file = $request->file('resume');
            $resume_extension = $resume_file->getClientOriginalExtension();
            $resume_filename = time().".".$resume_extension;
            $resume_file->move('uploads/resume/',$resume_filename);
            }


        return User::create([
            'name'           => $data['name'],
            'email'          => $data['email'],
            'password'       => Hash::make($data['password']),
            'phone'          => $data['phone'],
            'experience'     => $data['experience'],
            'notice_period'  => $data['notice_period'],
            'skills'         => $data['skills'],
            'job_location_id'=> $data['job_location_id'],
            'photo'          => $profile_image_filename,
            'resume'         => $resume_filename,
            
            
           ]);
    }

    
}
