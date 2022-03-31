<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registration',[RegistrationController::class,'index'])->name('registration');
Route::get('/edit/{id}',[RegistrationController::class,'edit'])->name('edit');
// Route::post('/update',[RegistrationController::class,'update'])->name('update');

Route::get('/destroy/{id}',[RegistrationController::class,'destroy'])->name('destroy');
 

Route::post('/submitform',[RegistrationController::class,'store'])->name('submitform');
Route::get('/list',[RegistrationController::class,'list'])->name('list');
Route::get('/webrinvent',[RegistrationController::class,'webrinvent'])->name('webrinvent');
Route::post('/savetask',[RegistrationController::class,'savetask'])->name('savetask');

