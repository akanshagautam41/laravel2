<?php

use App\Http\Controllers\SendwelcomeMail;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('send-mail', [SendwelcomeMail::class,'sendMail']);
Route::get('contact', [SendwelcomeMail::class,'contactmail']);
Route::post('contact',[SendwelcomeMail::class,'contactSendMail'])->name('contact');