<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Carbon\Carbon; 
use App\Models\User; 


class authController extends Controller
{
    
    public function signIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        
        $user = [
            'email' => $request->input('email'), 
            'password' => $request->input('password')
        ];

        if (Auth::attempt($user)) {
            return redirect('home');
        }

        return redirect()->back()->withInput($request->only('email'));
    }

    
}
