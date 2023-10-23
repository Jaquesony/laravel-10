<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');

    // Fetch all users from the database
    // $users = DB::select('select * from users');
    
    // put condition using a binding
    // $user = DB::select("select * from users where email=?",['karim@gmail.com']);

    // create user new 
    // $user = DB::insert('insert into users (name,email,password) values(?,?,?)',['Karim1','karim2aa@gmail','password']);

    // Update user
    // $user = DB::update("update users set email = 'thanny@gmail.com' where id = 2");

    // use binding to update the user
    // $user = DB::update("update users set email = ? where id = ?",['karimissa@gmail.com',2]);

    // delete user
    // $user = DB::delete("delete from users where id = 2");
    // dd($users);

    //Using Query Builder to implement this issue

    //Get users
    // $users = DB::table('users')->get();

    // Get use using where condition
    // $user = DB::table('users')->where('id',1)->get();

    // insert the user in the database
    // $user = DB::table('users')->insert([
    //     'name'=>'jackson1',
    //     'email'=> 'jacksonaa11@gmail.com',
    //     'password'=>'password',

    // ]);

    // update the table
    // $user = DB::table('users')->where('id',4)->update(['name'=>'Kanungira']);

    //Delete the user
    // $user = DB::table('users')->where('id',4)->delete();

    // dd($users);

    // Using eloquent orm
    // get all users
    $users = User::all();
    // delete all users
    // $users = User::truncate();
    // $users = User::where('id',6)->first();

    // create new users
    // $user = User::create([
    //     'name'=>'kanungira',
    //     'email'=>'kanungira@gmail.com',
    //     'password'=>'kanungira123',
    // ]);

    // update the user
    // $userr = User::find(6);
    // $user = $userr->update([
    //         'email'=>'mbozihuko@gmail.com',
    //     ]);

    // $user = User::where('id',6)->update([
    //     'email'=>'abcde@gmail.com',
    // ]);

    // delete the user to the database
    // $user = User::find(2);
    // $user = User::find(8);
    // $user->delete();
    dd($users);

    
});
// You can do this is still working instead of get
Route::view('/home','home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';