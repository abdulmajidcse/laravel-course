<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('two-step-verification', function(Request $request) {

    $username = $request->query('username');
    $mobile = $request->query('mobile');

    if ($username == 'user' && $mobile == '017700') {
        $code = uniqid();
        Log::channel('message')->info('Your two step verfication code is : ' . $code);
    } else {
        return 'Username or mobile are wrong!';
    }

    return 'Check your message for verification!';
});