<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\authController;
use App\Http\Controllers\forgotPasswordController;
use App\Http\Controllers\RecipeController;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;


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
Route::middleware(['guest'])->group(function(){

    Route::get('/sign-in-page', function () { return view('auth.signin'); })->name('signInPage');
    Route::get('/signup-up-page', function () {return view('auth.signup');})->name('registerPage');
    Route::post('/sign-up',[UserController::class,'create'])->name('signup');
    Route::post('/sign-in',[authController::class,'signIn'])->name('login');

});


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPassword'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'forgetPassword'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPassword'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password.post');


Route::middleware(['auth'])->group(function(){

    Route::get('/home', function () { return view('dashboard', [  'user' => Illuminate\Support\Facades\Auth::user(), 'recipes' =>  App\Models\Recipe::all(),]);})->name('home');

    Route::post('/update-profile', [UserController::class,'update'])->name('update.profile');

    Route::patch('/update-password', [UserController::class,'updatePassword'])->name('update.password');

    Route::get('/edit-profile', function () {return view('edit-profile',['user' => Illuminate\Support\Facades\Auth::user() ]); })->name('edit-profile');

    Route::get('/change-password', function () {
        return view('change-password',['user' => Illuminate\Support\Facades\Auth::user() ]);
    })->name('password.change');

    Route::get('/logout', [UserController::class,'logout'])->name('logout');

    Route::middleware(['admin'])->group(function(){
        Route::post('/add-recipe', [RecipeController::class,'create'])->name('add.recipe');
        Route::get('/delete-recipe/{id}',[RecipeController::class,'delete'])->name('recipe.delete');
        Route::post('/updateRecipe',[RecipeController::class,'update'])->name('recipe.update');
        Route::get('/edit-recipe/{id}&{user}', function ($id,$user) {return view('edit-recipe',[
            'recipe' =>App\Models\Recipe::find($id),
            'user' => App\Models\User::find($user)]);})->name('recipe.edit');
    }); 
});

Route::get('/401', function () {return view('401');});
Route::get('/', function () {return redirect('home');});


