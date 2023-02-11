<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\authController;
use App\Http\Controllers\RecipeController;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Psr7\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('auth.signin'); })->name('auth');



Route::get('/edit-profile', function () {return view('edit-profile',['user' => Illuminate\Support\Facades\Auth::user() ]); })->name('edit-profile');



Route::get('/change-password', function () {
    return view('change-password',['user' => Illuminate\Support\Facades\Auth::user() ]);
})->name('password.change');






Route::get('/logout', [UserController::class,'logout'])->name('logout');

Route::post('/update-profile', [UserController::class,'update'])->name('update.profile');


Route::get('/signup', function () {return view('auth.signup');})->name('register');


Route::get('/edit-recipe/{id}&{user}', function ($id,$user) {return view('edit-recipe',[
    'recipe' =>App\Models\Recipe::find($id),
    'user' => App\Models\User::find($user)]);})->name('recipe.edit');


Route::get('/delete-recipe/{id}',[RecipeController::class,'delete'])->name('recipe.delete');


Route::post('/updateRecipe',[RecipeController::class,'update'])->name('recipe.update');


Route::post('/sign-up',[UserController::class,'create'])->name('signup');


Route::post('/sign-in',[authController::class,'signIn'])->name('login');


Route::get('dashboard', function () {
    return view('dashboard', [  'user' => Illuminate\Support\Facades\Auth::user(),
                                'recipes' =>  App\Models\Recipe::all(),]);})->name('dashboard');

Route::post('/add-recipe', [RecipeController::class,'create'])->name('add.recipe');

Route::get('/forgot-password', function () { return view('auth.forgot-password'); })->name('password.request');
    
Route::post('/forgot-password', [authController::class,'resetPassword'])->name('password.email'); 

Route::get('/reset-password/{token}', function ($token) { return view('auth.reset-password', ['token' => $token]); })->name('password.reset');


Route::patch('/update-password', [UserController::class,'updatePassword'])->name('update.password');