<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Carbon\Carbon; 
use App\Models\User; 


class forgotPasswordController extends Controller
{
    /**
       * Write code on Method
       *
       * @return response()
       */

    public function showForgetPassword()
    {
        return view('auth.forgetPassword');
     }
 
     /**
      * Write code on Method
      *
      * @return response()
      */
     public function forgetPassword(Request $request)
     {
         $request->validate([
             'email' => 'required|email|exists:users',
         ]);
 
         $token = Str::random(64);
 
         DB::table('password_resets')->insert([
             'email' => $request->email, 
             'token' => $token, 
             'created_at' => Carbon::now()
           ]);
 
         Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
             $message->to($request->email);
             $message->subject('Reset Password');
         });
 
         return back()->with('message', 'We have e-mailed your password reset link!');
     }
     /**
      * Write code on Method
      *
      * @return response()
      */
     public function showResetPassword($token) { 
        return view('auth.resetPassword', ['token' => $token]);
     }
 
     /**
      * Write code on Method
      *
      * @return response()
      */
     public function ResetPassword(Request $request)
     {
         $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|min:6|confirmed',
             'password_confirmation' => 'required'
         ]);
 
         $updatePassword = DB::table('password_resets')
                             ->where([
                               'email' => $request->email, 
                               'token' => $request->token
                             ])
                             ->first();
 
         if(!$updatePassword){
             return back()->withInput()->with('error', 'Invalid token!');
         }
 
         $user = User::where('email', $request->email)
                     ->update(['password' => Hash::make($request->password)]);

         DB::table('password_resets')->where(['email'=> $request->email])->delete();
 
         return redirect('/')->with('message', 'Your password has been changed!');
     }
}
