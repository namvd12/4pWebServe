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

Route::put('testPHP/machine.php','App\Http\Controllers\api\deviceController@infor');

Route::post('testPHP/machine.php','App\Http\Controllers\api\deviceController@infor');

Route::put('testPHP/History.php','App\Http\Controllers\api\historyController@infor');

Route::post('testPHP/History.php','App\Http\Controllers\api\historyController@infor');

Route::put('testPHP/HistoryReport.php','App\Http\Controllers\api\historyReportController@infor');

Route::post('testPHP/HistoryReport.php','App\Http\Controllers\api\historyReportController@infor');