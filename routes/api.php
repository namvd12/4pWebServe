<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\historyController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*device */
Route::put('testPHP/machine.php','App\Http\Controllers\api\deviceController@infor');

Route::post('testPHP/machine.php','App\Http\Controllers\api\deviceController@infor');

Route::put('testPHP/History.php','App\Http\Controllers\api\historyController@infor');

Route::post('testPHP/History.php','App\Http\Controllers\api\historyController@infor');

Route::put('testPHP/HistoryReport.php','App\Http\Controllers\api\historyReportController@infor');

Route::post('testPHP/HistoryReport.php','App\Http\Controllers\api\historyReportController@infor');

/*user */
Route::post('testPHP/user/login.php','App\Http\Controllers\api\user\loginController@login');

Route::post('testPHP/user/edit.php','App\Http\Controllers\api\user\editController@edit');

Route::post('testPHP/user/logout.php','App\Http\Controllers\api\user\logoutController@logout');

Route::post('testPHP/user/resetPassword.php','App\Http\Controllers\api\user\ResetPasswordController@reset');

Route::post('sendNotification', 'App\Http\Controllers\api\pushNotiController@push');

Route::post('sendCallMaterial','App\Http\Controllers\api\notiCallMaterial\notiMaterialController@sendCallMaterial');