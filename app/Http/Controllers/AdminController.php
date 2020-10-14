<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Sentinel;
use Reminder;
use Mail;
use Hash;
use Image;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->check()){
            return redirect()->back();
        }else {
            return view('backend/login');
        }
    }

    public function login(Request $request)
    {
        Session::put('page', 'admin');
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/admin');
        }else {
            Session::flash('error_message', 'Email or Password is Incorrect');
            return redirect()->back();
        }

        // $check = DB::table('admin')->where(['email' => $request->email],[ 'password' => $request->password])->get();

        // if($check)
        // {
        //     return redirect('/admin');
        // }
        // else
        // {
        //     return view('backend/login');
        // }
    }

    public function forgot()
    {
        return view('backend/forgot');
/*
        dd($request->all());
        exit();
*/
        // $update = DB::table('admin')->update(['password' => $request->password]);

        // if($update)
        // {
        //     return redirect('/admin');
        // }
        // else
        // {
        //     return view('backend/login');
        // }
    }
    public function updatePassword(Request $request)
    {
        // $this->validate($request, [
        //     'password' => 'min:8|max:25|confirmed',
        // ]);
        $password = Hash::make($request->password);
        $update = Admin::find($request->email);
        $update->password = $password;


        $test = $update->save();
        if($test){
            Session::flash('update_password', 'Please login with updated password.');
            return redirect('/');
        }else{
            return redirect()->back();
        }
        // $update = DB::table('admins')->update('password' => $request->password)->where('email', $request->email);

        // if($update){
        //     return "Good";
        // }else{
        //     return "Bad";
        // }
        
    }
    // public function password(Request $request)
    // {
    //     $admin = Admin::whereEmail($request->email)->first();
    //     if($admin == null){
    //         return redirect()->back()->with(['error' => 'Email not exist.']);
    //     }
    //     $admin = Sentinel::findById(0);
    //     $reminder = Reminder::exists($admin);
    //     $this->sendEmail($admin, $reminder->code);

    //     return redirect()->back()->with(['success' => 'Reset code send it to your Email']);
    // }
    // public function sendEmail($admin, $code)
    // {
    //     Mail::send(
    //         'email.forgot',
    //         ['admin' => $admin, 'code' => $code],
    //         function($message) use ($admin){
    //             $message->to($user->email);
    //             $message->subject("$user->name, Reset Your Password");
    //         }
    //     );
    // }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
    // Profile Settings
    public function profile()
    {
        $sql = Admin::find(0);
        return view('backend/profile/index', [ 'sql' => $sql ]);
    }
    public function profileEdit()
    {
        $sql = Admin::all();
        return view('backend/profile/update', [ 'sql' => $sql ]);
    }
    public function profileUpdate(Request $request)
    {

        $image_temp = $request->file('admin_image');
        $extension = $image_temp->getClientOriginalExtension();
        $imageName = rand(111, 999999).'.'.$extension;
        $imagePath = 'images/'.$imageName;
        Image::make($image_temp)->save($imagePath);
        
        $sql = DB::table('admins')->where('id', 0)->update(['name' => $request->name, 'email' => $request->email, 'image' => $imageName]);
        $sql1 = DB::table('users')->where('id', 1)->update(['name' => $request->name, 'email' => $request->email, 'image' => $imageName]);
        if($sql && $sql1){
            return redirect('/admin/profile')->with('update', 'Data Successfully Update.');
        }else{
            return redirect()->back()->with('not_added', 'Something is wrong, Try Again.');
        } 
    }
}
