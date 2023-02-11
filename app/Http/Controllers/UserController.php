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
            'email' => 'required|email',
        ]);
    
        $user = new User;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->id = $request->input('id');

        $update = User::where('id', $user->id)->update([
            'username'=>$user->username,
            'email'=>$user->email,
            ]);
            if($update){
                return redirect('dashboard');
            }
    }

    public function updatePassword(Request $request){
        $validatedData = $request->validate([
            'old_password' => ['required', 'min:6'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);
    
        $user = Auth::user();
    
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The current password is incorrect.']);
        }
    
        $user->password = Hash::make($request->password);
        $update = User::where('id', $user->id)->update([
            'password'=>$user->password,
            ]);
    
        return redirect()->back()->with(['status' => 'Password updated successfully.']);
    }

    public function logout(Request $request)
    {   
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
