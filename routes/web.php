<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\devicesController;
use App\Http\Controllers\MailController;
use App\Mail\wellcome;
use App\Http\Controllers\PushNotificationController;
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


// Route::get('device',[devicesController::class,'view'])->name('device');

Route::get('/','App\Http\Controllers\devicesController@index');

// Route for mailing
Route::get('/mailer',[MailController::class,'sendMail']);
// Route::get('mailer',function(){
//     return new wellcome();
// });

Route::get('sendNotification', [PushNotificationController::class, 'sendPushNotification'])->name('send.notification');


// Route::resource('/admin','App\Http\Controllers\adminController')->middleware('role');

// Route::get('/', function () {
//     return view('home');
// })->name('home');

// Route::get('/products/{id}',[
//     ProductsController::class,
//     'detail'
// ])->where('id','[0-9]+');
// Route::get('/users',function()
// {
//     return 'this is user page';
// });
// //response an array
// Route::get('/device',function(){
//     return ['device 1', 'device 2', 'device 3'];
// });
// Route::get('/infor',function(){
//     return response()->json()([
//         'name' => 'device1',
//         'SN' => 'ABC'
//     ]);
// });
// //response another request = redirect
// Route::get('/something',function(){
//     return redirect('/');
// });