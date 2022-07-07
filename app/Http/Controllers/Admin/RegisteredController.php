<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use File;

class RegisteredController extends Controller
{
    public function index(){
       //$users = User::paginate(5);
        $users = User::all();
      // dd($users->name);
        return view('admin.users.index')->with('users',$users);
    }

    public function search_filter(){
       $users = User::paginate(4);
        //$users = User::all();
      // dd($users->name);
        return view('admin.users.search_filter')->with('users',$users);
    }

    public function editrole($id){
        $user_roles = User::find($id);

        return view('admin.users.edit')->with('user_roles',$user_roles);
    }

    public function updaterole(Request $request, $id){
        $user = User::find($id);
        //dd($user);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_as = $request->input('roles_as');
        $user->update();

        return redirect('registered-user')->with('status','Role is Updated');

    }

    public function delete($id){
        $user = User::findOrFail($id);
        //dd($user);   

       $image_path = base_path()."/public/uploads/profile_image/".$user->photo;
       $doc_path = base_path()."/public/uploads/resume/".$user->resume;
        if(file_exists($image_path)){
            File::delete($image_path);
        } 
         if(file_exists($doc_path)){
            File::delete($doc_path);
        } 

        $user->delete();
       // return back()->with('status','User is Deleted Successfully');
       return redirect('registered-user')->with('status','Deleted Successfully');

    }

    public function restore_all()
    {
    User::onlyTrashed()->restore();

        return back()->with('status', 'All Records Restored successfully');
    }

    

   

    

    
}
