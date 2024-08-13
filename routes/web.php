<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\devicesController;
use App\Http\Controllers\MailController;
use App\Mail\wellcome;

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

Route::get('','App\Http\Controllers\web\login\loginController@index');

/* maintenacePlan controller */
Route::get('maintenacePlan','App\Http\Controllers\web\sparePart\maintenacePlanController@index')->name('maintenacePlan');

Route::get('showNextMonth','App\Http\Controllers\web\sparePart\maintenacePlanController@showNextMonth')->name('showNextMonth');

Route::get('showLastMonth','App\Http\Controllers\web\sparePart\maintenacePlanController@showLastMonth')->name('showLastMonth');

Route::get('newMachinePlan','App\Http\Controllers\web\sparePart\maintenacePlanController@newMachinePlan')->name('newMachinePlan');

Route::post('getMachineInfor','App\Http\Controllers\web\sparePart\maintenacePlanController@getMachineInfor')->name('getMachineInfor');

Route::post('saveNewPlan','App\Http\Controllers\web\sparePart\newMachineMaintenaceController@newMachinePlan')->name('saveNewPlan');

Route::get('listMachinePlan','App\Http\Controllers\web\sparePart\listMachinePlanController@index')->name('listMachinePlan');

Route::get('updateMachinePlan','App\Http\Controllers\web\sparePart\updateMachinePlanController@updateView')->name('updateMachinePlan');

Route::post('updateNewMachinePlan','App\Http\Controllers\web\sparePart\updateMachinePlanController@newMachinePlan')->name('updateNewMachinePlan');

Route::post('saveMachinePlan','App\Http\Controllers\web\sparePart\updateMachinePlanController@save')->name('savePlan');

Route::post('deleteMachinePlan','App\Http\Controllers\web\sparePart\updateMachinePlanController@deleteMachinePlan')->name('deleteMachinePlan');

/* login controller */
Route::post('loging','App\Http\Controllers\web\login\loginController@loging')->name('loging');

/* newPassword controller */
Route::get('newPassword','App\Http\Controllers\newPasswordController@newPassword')->name('newPassword');

Route::post('resetPassword','App\Http\Controllers\newPasswordController@resetPassword')->name('resetPassword');

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