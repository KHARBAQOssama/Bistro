<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    //
    function create(Request $request){
        
        $validatedData = $request->validate([
                'username' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|same:password',
            ]);
        try {
            $user = new User;
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $save = $user->save();
            Auth::attempt([
                'password' => $request->input('password'),
                'email' => $request->input('email'),
            ]);
                
        } catch (ValidationException $e) {
            return redirect()->back()->withInput($request->input())->withErrors($validatedData);
        }
        return redirect('dashboard');;
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);
    
        $user = new User;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->id = $request->input('id');
        $user->password = Hash::make($request->input('password'));

        $update = User::where('id', $user->id)->update([
            'username'=>$user->username,
            'email'=>$user->email,
            'password'=>$user->password,
            ]);
    }


    public function logout(Request $request)
    {   
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
