<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\LockScreen;


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
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------- home dashboard ------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ----------------------------- lock screen --------------------------------//
Route::get('lock_screen', [App\Http\Controllers\LockScreen::class, 'lockScreen'])->middleware('auth')->name('lock_screen');
Route::post('unlock', [App\Http\Controllers\LockScreen::class, 'unlock'])->name('unlock');

// ------------------------------ register ---------------------------------//
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');

// ----------------------------- forget password ----------------------------//
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// ----------------------------- user profile ------------------------------//
Route::get('profile_user', [App\Http\Controllers\UserManagementController::class, 'profile'])->name('profile_user');
Route::post('profile_user/store', [App\Http\Controllers\UserManagementController::class, 'profileStore'])->name('profile_user/store');

// ----------------------------- user userManagement -----------------------//
Route::get('userManagement', [App\Http\Controllers\UserManagementController::class, 'index'])->middleware('auth')->name('userManagement');
Route::get('employeeManagement', [App\Http\Controllers\EmployeeManagementController::class, 'index'])->middleware('auth')->name('employeeManagement');

Route::get('clientManagement', [App\Http\Controllers\ClientManagementController::class, 'index'])->middleware('auth')->name('clientManagement');

Route::get('generalDocuments', [App\Http\Controllers\GeneralDocumentController::class, 'index'])->middleware('auth')->name('generalDocuments');
Route::get('generalDocuments/add', [App\Http\Controllers\GeneralDocumentController::class, 'addNewGeneralDocument'])->middleware('auth')->name('generalDocuments/add');
Route::post('generalDocument/add/save', [App\Http\Controllers\GeneralDocumentController::class, 'addNewGDocsSave'])->name('generalDocument/add/save');
Route::get('gDocument/download/{path}', [App\Http\Controllers\GeneralDocumentController::class, 'download'])->middleware('auth')->name('gDocument/download/{path}');


Route::get('employeeDocuments', [App\Http\Controllers\EmployeeDocumentController::class, 'index'])->middleware('auth')->name('employeeDocuments');
Route::get('employeeDocuments/add', [App\Http\Controllers\EmployeeDocumentController::class, 'addNewEmployeeDocument'])->middleware('auth')->name('employeeDocuments/add');
Route::post('employeeDocument/add/save', [App\Http\Controllers\EmployeeDocumentController::class, 'addNewEDocsSave'])->middleware('auth')->name('employeeDocument/add/save');
Route::get('view/employeeDocumentdetail/{id}', [App\Http\Controllers\EmployeeDocumentController::class, 'viewDetail'])->middleware('auth');
Route::get('employeeDocument/download/{path}', [App\Http\Controllers\EmployeeDocumentController::class, 'download'])->middleware('auth')->name('employeeDocument/download/{path}');
Route::get('employeDocumentDelete/{id}', [App\Http\Controllers\EmployeeDocumentController::class, 'delete'])->middleware('auth');

Route::get('employmentStatus', [App\Http\Controllers\EmploymentStatusController::class, 'index'])->middleware('auth')->name('employmentStatus');
Route::get('employmentStatus/add', [App\Http\Controllers\EmploymentStatusController::class, 'addNewEmploymentStat'])->middleware('auth')->name('employmentStatus/add');
Route::post('employmentStat/add/save', [App\Http\Controllers\EmploymentStatusController::class, 'addNewEmployStatSave'])->middleware('auth')->name('employmentStat/add/save');
Route::get('view/employmentStatdetail/{id}', [App\Http\Controllers\EmploymentStatusController::class, 'viewDetail'])->middleware('auth');
Route::post('updateEmploymentStat', [App\Http\Controllers\EmploymentStatusController::class, 'updateEmployStat'])->name('updateEmploymentStat');
Route::get('employmentDelete/{id}', [App\Http\Controllers\EmploymentStatusController::class, 'employDelete'])->middleware('auth');

Route::get('jobStatus', [App\Http\Controllers\JobStatusController::class, 'index'])->middleware('auth')->name('jobStatus');
Route::get('jobStatus/add', [App\Http\Controllers\JobStatusController::class, 'addNewJobStat'])->middleware('auth')->name('jobStatus/add/add');
Route::post('jobStatus/add/save', [App\Http\Controllers\JobStatusController::class, 'addNewJobStatSave'])->middleware('auth')->name('jobStatus/add/save');
Route::get('view/jobStatusdetail/{id}', [App\Http\Controllers\JobStatusController::class, 'viewDetail'])->middleware('auth');
Route::post('updateJobStatus', [App\Http\Controllers\JobStatusController::class, 'updateJobStat'])->name('updateJobStatus');
Route::get('jobStatusDelete/{id}', [App\Http\Controllers\JobStatusController::class, 'jobStatDelete'])->middleware('auth');

Route::get('lineManagers', [App\Http\Controllers\LineManagersController::class, 'index'])->middleware('auth')->name('lineManagers');
Route::get('lineManagers/add', [App\Http\Controllers\LineManagersController::class, 'addNewLineManager'])->middleware('auth')->name('lineManagers/add');
Route::post('lineManagers/add/save', [App\Http\Controllers\LineManagersController::class, 'addNewLineManagerSave'])->middleware('auth')->name('lineManagers/add/save');
Route::get('view/lineManagersDetail/{id}', [App\Http\Controllers\LineManagersController::class, 'viewLineManagersDetail'])->middleware('auth');
Route::post('updateLineManagers', [App\Http\Controllers\LineManagersController::class, 'updateLineMages'])->name('updateLineManagers');
Route::get('lineManagersDelete/{id}', [App\Http\Controllers\LineManagersController::class, 'lineManagersDelete'])->name('lineManagersDelete/{id}');

Route::get('view/generalDocumentDetail/{id}', [App\Http\Controllers\GeneralDocumentController::class, 'viewDetail'])->middleware('auth');
Route::post('updateDocument', [App\Http\Controllers\GeneralDocumentController::class, 'update'])->name('updateDocument');
Route::get('delete_document/{id}', [App\Http\Controllers\GeneralDocumentController::class, 'delete'])->middleware('auth');

Route::get('user/add/new', [App\Http\Controllers\UserManagementController::class, 'addNewUser'])->middleware('auth')->name('user/add/new');
Route::post('user/add/save', [App\Http\Controllers\UserManagementController::class, 'addNewUserSave'])->name('user/add/save');




Route::get('client/add/new', [App\Http\Controllers\ClientManagementController::class, 'addNewClient'])->middleware('auth')->name('client/add/new');
Route::post('client/add/save', [App\Http\Controllers\ClientManagementController::class, 'addNewClientSave'])->middleware('auth')->name('client/add/save');

Route::get('view/clientDetail/{id}', [App\Http\Controllers\ClientManagementController::class, 'viewDetail'])->middleware('auth');
Route::post('updateClient', [App\Http\Controllers\ClientManagementController::class, 'update'])->name('updateClient');


Route::get('clientEmployee', [App\Http\Controllers\ClientEmployeeController::class, 'index'])->middleware('auth')->name('clientEmployee');
Route::get('clientEmployee/add', [App\Http\Controllers\ClientEmployeeController::class, 'addNewClientEmployee'])->middleware('auth')->name('clientEmployee/add');
Route::post('clientEmployee/add/save', [App\Http\Controllers\ClientEmployeeController::class, 'addNewClientEmployeeSave'])->middleware('auth')->name('clientEmployee/add/save');
Route::get('view/clientEmployeedetail/{id}', [App\Http\Controllers\ClientEmployeeController::class, 'viewDetail'])->middleware('auth');
Route::post('updateClientEmployee', [App\Http\Controllers\ClientEmployeeController::class, 'update'])->name('updateClientEmployee');
Route::get('clientEmployeeDelete/{id}', [App\Http\Controllers\ClientEmployeeController::class, 'delete'])->middleware('auth');



Route::get('view/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'viewDetail'])->middleware('auth');
Route::get('view/detail2/{id}', [App\Http\Controllers\UserManagementController::class, 'viewDetail2'])->middleware('auth');
Route::get('viewSkillset/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'viewSkillset'])->middleware('auth');
Route::get('viewDocument/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'viewDetailDocument'])->middleware('auth');   
Route::get('viewEmployeeNotes/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'viewDetailEmployNotes'])->middleware('auth');   
Route::post('updateEmployeeDocument', [App\Http\Controllers\EmployeeDocumentController::class, 'updateEmployeeDocs'])->name('updateEmployeeDocument');
Route::post('updateEmployeenotes', [App\Http\Controllers\UserManagementController::class, 'updateEmployNotes'])->name('updateEmployeenotes');
Route::get('employeeNotesDelete/{id}', [App\Http\Controllers\UserManagementController::class, 'deleteEmployeeNotes'])->middleware('auth');
Route::post('updateSkillset', [App\Http\Controllers\UserManagementController::class, 'updateEmploySkillset'])->name('updateSkillset');
Route::get('clientEmployDelete/{id}', [App\Http\Controllers\UserManagementController::class, 'deleteClientEmployee'])->middleware('auth');
Route::post('employeeNotes/add/save', [App\Http\Controllers\UserManagementController::class, 'addNotes'])->middleware('auth')->name('employeeNotes/add/save');


Route::post('update', [App\Http\Controllers\UserManagementController::class, 'update'])->name('update');
Route::post('clientEmployeeUpdate', [App\Http\Controllers\UserManagementController::class, 'updateClientEmploy'])->name('clientEmployeeUpdate');
Route::get('viewEmployeeDocument/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'viewDetailEmployDocuments'])->middleware('auth');   
Route::post('documentEmployeeUpdate', [App\Http\Controllers\UserManagementController::class, 'updateDocumentEmploy'])->name('documentEmployeeUpdate');

Route::post('/upload-image', function(Request $request) {
    $path = $request->file('image')->store('public/images');
    $url = Storage::url($path);
    return response()->json(['url' => $url]);
})->name('upload-image');

Route::get('announcement', [App\Http\Controllers\AnnouncementController::class, 'index'])->middleware('auth')->name('announcement');
Route::get('announcement/add', [App\Http\Controllers\AnnouncementController::class, 'addNewAnnouncement'])->middleware('auth')->name('announcement/add');
Route::post('announcement/add/save', [App\Http\Controllers\AnnouncementController::class, 'addNewAnnouncementSave'])->middleware('auth')->name('announcement/add/save');
Route::get('viewAnnouncement/detail/{id}', [App\Http\Controllers\AnnouncementController::class, 'ViewAnnouncement'])->middleware('auth');
Route::post('updateAnnouncement', [App\Http\Controllers\AnnouncementController::class, 'update'])->name('updateAnnouncement');
Route::get('deleteAnnouncement/{id}', [App\Http\Controllers\AnnouncementController::class, 'delete'])->middleware('auth');
Route::post('images', [App\Http\Controllers\AnnouncementController::class, 'store'])->middleware('auth')->name('images.store');


Route::get('delete_user/{id}', [App\Http\Controllers\UserManagementController::class, 'delete'])->middleware('auth');
Route::get('activity/log', [App\Http\Controllers\UserManagementController::class, 'activityLog'])->middleware('auth')->name('activity/log');
Route::get('activity/login/logout', [App\Http\Controllers\UserManagementController::class, 'activityLogInLogOut'])->middleware('auth')->name('activity/login/logout');

Route::get('change/password', [App\Http\Controllers\UserManagementController::class, 'changePasswordView'])->middleware('auth')->name('change/password');
Route::post('change/password/db', [App\Http\Controllers\UserManagementController::class, 'changePasswordDB'])->name('change/password/db');

// ----------------------------- form staff ------------------------------//
Route::get('form/staff/new', [App\Http\Controllers\FormController::class, 'index'])->middleware('auth')->name('form/staff/new');
Route::post('form/save', [App\Http\Controllers\FormController::class, 'saveRecord'])->name('form/save');
Route::get('form/view/detail', [App\Http\Controllers\FormController::class, 'viewRecord'])->middleware('auth')->name('form/view/detail');
Route::get('form/view/detail/{id}', [App\Http\Controllers\FormController::class, 'viewDetail'])->middleware('auth');
Route::post('form/view/update', [App\Http\Controllers\FormController::class, 'viewUpdate'])->name('form/view/update');
Route::get('delete/{id}', [App\Http\Controllers\FormController::class, 'viewDelete'])->middleware('auth');



// Route::get('/tab1',function(){
//     return view('tab');
// });
// Route::get('/tab2',function(){
//     return view('tab');
// });
// Route::get('/tab3',function(){
   
// });