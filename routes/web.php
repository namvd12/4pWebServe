<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\devicesController;
use App\Http\Controllers\MailController;
use App\Mail\wellcome;
use GuzzleHttp\Middleware;

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

/************************** login controller ***************************************/
Route::get('','App\Http\Controllers\web\login\loginController@index')->name('login');

Route::post('loging','App\Http\Controllers\web\login\loginController@loging')->name('loging');

Route::middleware(['role'])->group(function(){

    /*setting action */
    Route::get('logout','App\Http\Controllers\web\login\loginController@logout')->name('logout');
    
    Route::get('settings','App\Http\Controllers\web\login\userSettingsController@settings')->name('settings');
    
    Route::post('saveProfile','App\Http\Controllers\web\login\userSettingsController@saveProfile')->name('saveProfile');

    Route::post('saveNewPassword','App\Http\Controllers\web\login\userSettingsController@saveNewPassword')->name('saveNewPassword');

    Route::post('saveConfigSystem','App\Http\Controllers\web\login\userSettingsController@saveConfigSystem')->name('saveConfigSystem');

    Route::post('saveMode','App\Http\Controllers\web\login\userSettingsController@saveMode')->name('saveMode');

    Route::post('saveLineWorking','App\Http\Controllers\web\login\userSettingsController@saveLineWorking')->name('saveLineWorking');

    /* newPassword controller */
    Route::get('newPassword','App\Http\Controllers\newPasswordController@newPassword')->name('newPassword');

    Route::post('resetPassword','App\Http\Controllers\newPasswordController@resetPassword')->name('resetPassword');

    /********************************** maintenacePlan controller ********************************/
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

    /*list spare part */

    Route::get('listSparePartView','App\Http\Controllers\web\sparePart\listSparePartController@index')->name('listSparePartView');

    Route::get('NewSparePart','App\Http\Controllers\web\sparePart\listSparePartController@NewSparePart')->name('NewSparePart');

    Route::post('saveNewSparePart','App\Http\Controllers\web\sparePart\listSparePartController@saveNewSparePart')->name('saveNewSparePart');

    Route::post('updateTimeSparePart','App\Http\Controllers\web\sparePart\listSparePartController@updateTimeSparePart')->name('updateTimeSparePart');

    Route::get('editSparePart','App\Http\Controllers\web\sparePart\listSparePartController@editSparePart')->name('editSparePart');

    Route::post('saveEditSparePart','App\Http\Controllers\web\sparePart\listSparePartController@saveEditSparePart')->name('saveEditSparePart');

    Route::post('deleteSparePart','App\Http\Controllers\web\sparePart\listSparePartController@deleteSparePart')->name('deleteSparePart');

    /* list devices and history */
    Route::get('listDeviceAndHistory','App\Http\Controllers\web\devices\listDeviceAndHistory@index')->name('listDeviceAndHistory');

    Route::post('searchDevice','App\Http\Controllers\web\devices\listDeviceAndHistory@searchDevice')->name('searchDevice');

    Route::post('searchHistoryReport','App\Http\Controllers\web\devices\listDeviceAndHistory@searchHistoryReport')->name('searchHistoryReport');

    Route::get('newDevice','App\Http\Controllers\web\devices\listDeviceAndHistory@newDevice')->name('newDevice');

    Route::post('saveNewDevice','App\Http\Controllers\web\devices\listDeviceAndHistory@saveNewDevice')->name('saveNewDevice');

    Route::get('editDevice','App\Http\Controllers\web\devices\listDeviceAndHistory@editDevice')->name('editDevice');

    Route::post('saveEditDevice','App\Http\Controllers\web\devices\listDeviceAndHistory@saveEditDevice')->name('saveEditDevice');

    Route::post('deleteMachine','App\Http\Controllers\web\devices\listDeviceAndHistory@deleteMachine')->name('deleteMachine');

    Route::post('deleteHistory','App\Http\Controllers\web\devices\listDeviceAndHistory@deleteHistory')->name('deleteHistory');

    /*Export history */
    Route::get('viewExport','App\Http\Controllers\web\devices\historyExportController@index')->name('viewExport');

    Route::post('exportData','App\Http\Controllers\web\devices\historyExportController@export')->name('exportData');

    /*Visual Reporting  */

    Route::get('viewReportAllLine','App\Http\Controllers\web\report\reportController@viewReportAllLine')->name('viewReportAllLine');

    /*All line */
    Route::post('viewReportCurrentByDay','App\Http\Controllers\web\report\reportController@viewReportCurrentByDay')->name('viewReportCurrentByDay');

    Route::post('viewReportCurrentByWeek','App\Http\Controllers\web\report\reportController@viewReportCurrentByWeek')->name('viewReportCurrentByWeek');

    Route::post('viewReportCurrentByMonth','App\Http\Controllers\web\report\reportController@viewReportCurrentByMonth')->name('viewReportCurrentByMonth');

    /*Each line */
    Route::post('viewReportEachLineByDay','App\Http\Controllers\web\report\reportController@viewReportEachLineByDay')->name('viewReportEachLineByDay');

    Route::post('viewReportEachLineByWeek','App\Http\Controllers\web\report\reportController@viewReportEachLineByWeek')->name('viewReportEachLineByWeek');

    Route::post('viewReportEachLineByMonth','App\Http\Controllers\web\report\reportController@viewReportEachLineByMonth')->name('viewReportEachLineByMonth');

    /*MTTR */
    Route::post('viewReportMTTRByDay','App\Http\Controllers\web\report\reportController@viewReportMTTRByDay')->name('viewReportMTTRByDay');

    Route::post('viewReportMTTRByWeek','App\Http\Controllers\web\report\reportController@viewReportMTTRByWeek')->name('viewReportMTTRByWeek');

    Route::post('viewReportMTTRByMonth','App\Http\Controllers\web\report\reportController@viewReportMTTRByMonth')->name('viewReportMTTRByMonth');

    /*MTBF */
    Route::post('viewReportMTBFByDay','App\Http\Controllers\web\report\reportController@viewReportMTBFByDay')->name('viewReportMTBFByDay');

    Route::post('viewReportMTBFByWeek','App\Http\Controllers\web\report\reportController@viewReportMTBFByWeek')->name('viewReportMTBFByWeek');

    Route::post('viewReportMTBFByMonth','App\Http\Controllers\web\report\reportController@viewReportMTBFByMonth')->name('viewReportMTBFByMonth');

    Route::middleware(['roleAdmin'])->group(function(){
    /*Categories */
    Route::post('saveNewCategories','App\Http\Controllers\web\categories\categoriesController@saveNewCategories')->name('saveNewCategories');

    Route::post('editNewCategories','App\Http\Controllers\web\categories\categoriesController@editNewCategories')->name('editNewCategories');

    Route::post('deleteCategory','App\Http\Controllers\web\categories\categoriesController@deleteCategory')->name('deleteCategory');

    Route::post('editCategory','App\Http\Controllers\web\categories\categoriesController@editCategory')->name('editCategory');

    /*User */
    Route::post('editUser','App\Http\Controllers\web\user\userController@editUser')->name('editUser');

    Route::post('saveEditUser','App\Http\Controllers\web\user\userController@saveEditUser')->name('saveEditUser');

    Route::post('deleteUser','App\Http\Controllers\web\user\userController@deleteUser')->name('deleteUser');

    Route::post('addNewUser','App\Http\Controllers\web\user\userController@addNewUser')->name('addNewUser');

    Route::post('saveAddNewUser','App\Http\Controllers\web\user\userController@saveAddNewUser')->name('saveAddNewUser');
    });
    
    // call material
    Route::post('viewCallMaterialDay','App\Http\Controllers\web\callMaterial\callMaterialController@viewCallMaterialDay')->name('viewCallMaterialDay');
    Route::get('viewCallMaterial','App\Http\Controllers\web\callMaterial\callMaterialController@viewCallMaterial')->name('viewCallMaterial');
    Route::post('updateStatusCall','App\Http\Controllers\web\callMaterial\callMaterialController@updateStatusCall')->name('updateStatusCall');
});

// test send mail
Route::get('sendMail','App\Http\Controllers\Controller@view')->name('sendMail');

// test notification
Route::get('noti','App\Http\Controllers\web\notification\notiController@view')->name('noti');
Route::get('sendCallMaterial','App\Http\Controllers\web\notification\notiController@sendNotification')->name('sendCallMaterial');

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