<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\crm\ConnectionController;
use App\Http\Controllers\crm\CourseController;
use App\Http\Controllers\crm\GroupController;
use App\Http\Controllers\crm\InterstedController;
use App\Http\Controllers\crm\MonthController;
//use App\Http\Controllers\crm\PayController;
use App\Http\Controllers\crm\PaymentController;
use App\Http\Controllers\crm\SallaryController;
use App\Http\Controllers\crm\StudentController;
use App\Http\Controllers\crm\TeachersController;
use App\Http\Controllers\crm\TotalPaymentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteAdminController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TeacherController;
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
/*
 * |--------------------------------------------------------------------------
 *                              Main                                         |
 * |--------------------------------------------------------------------------
 * */

Route::get('/',[FrontendController::class , 'index'])->name('main');
Route::get('/',[FrontendController::class , 'index'])->name('main');
/*      */
Route::resource('message',MessageController::class);

/*
 * |--------------------------------------------------------------------------
 *                              Main  End                                    |
 * |--------------------------------------------------------------------------
 * */

/*
 * |--------------------------------------------------------------------------
 * |                        Admin Route                                      |
 * |--------------------------------------------------------------------------
 * */

Route::get('/admin',[SiteController::class , 'index'])->name('index');
Route::get('admin/debtors',[SiteController::class , 'debtors'])->name('debtors');
Route::get('admin/out',[SiteController::class , 'out'])->name('out');
Route::get('admin/student_payments',[SallaryController::class , 'index'])->name('student_payments');
//Student
Route::get('admin/students',[StudentController::class , 'index'])->name('students');
Route::get('admin/students/create',[StudentController::class , 'create'])->name('students_create');
Route::get('admin/students/card/{id}',[StudentController::class , 'card'])->name('students_card');
//Teacher
Route::get('admin/teacher',[TeachersController::class , 'index'])->name('admin_teacher');
Route::get('admin/teacher/create',[TeachersController::class , 'create'])->name('admin_create');
//Course
Route::get('admin/course',[CourseController::class , 'index'])->name('course');
Route::get('admin/course/create',[CourseController::class , 'create'])->name('course_create');
//Group
Route::get('admin/group',[GroupController::class , 'index'])->name('group');
Route::get('admin/group/create',[GroupController::class , 'create'])->name('group_create');
//Connection
Route::get('admin/connection',[ConnectionController::class , 'index'])->name('connection');
Route::get('admin/connection/create',[ConnectionController::class , 'create'])->name('connection_create');
Route::delete('admin/connection/destroy/{user_id}/{group_id}', [ConnectionController::class, 'destroyConnection'])->name('connection.destroyConnection');
//Month
Route::get('admin/month',[MonthController::class , 'index'])->name('month');
Route::get('admin/month/create',[MonthController::class , 'create'])->name('month_create');
//Payment
Route::get('admin/payment',[PaymentController::class , 'index'])->name('payment');
Route::get('admin/payment/{month}/{user}', [PaymentController::class, 'pay'])->name('payments.show');
Route::get('admin/payment/view/{month}/{user}', [PaymentController::class, 'view'])->name('payments.view');
//Interested
Route::get('admin/interested',[InterstedController::class , 'index'])->name('interested');
//Total
Route::get('admin/cashbox',[TotalPaymentController::class , 'index'])->name('cashbox');
//Chart
Route::get('admin/chart',[SiteController::class , 'chart'])->name('chart');
//All Payment Info
Route::get('admin/Ipayment',[SiteController::class , 'ipayment'])->name('ipayment');
//Salary

//resource
Route::resource('student' , StudentController::class);
Route::resource('teacher' , TeachersController::class);
Route::resource('course' , CourseController::class);
Route::resource('group' , GroupController::class);
Route::resource('connection' , ConnectionController::class);
Route::resource('month' , MonthController::class);
Route::resource('payment' , PaymentController::class);
Route::resource('interested' , InterstedController::class);
Route::resource('total' , TotalPaymentController::class);
Route::resource('salary' , SallaryController::class);



/*
 * |--------------------------------------------------------------------------
 * |                        Admin Route End                                  |
 * |--------------------------------------------------------------------------
 * */

/*
 * |--------------------------------------------------------------------------
 * |                        Teacher Route                                    |
 * |--------------------------------------------------------------------------
 * */
Route::get('/teacher',[TeacherController::class , 'index'])->name('teacher');
Route::get('/teacher_students',[TeacherController::class , 'teacher_students'])->name('teacher_students');
Route::get('/teacher_groups',[TeacherController::class , 'teacher_groups'])->name('teacher_groups');
Route::get('/teacher/homework',[TeacherController::class , 'teacher_hw'])->name('teacher_hw');
Route::get('/teacher/books',[TeacherController::class , 'teacher_books'])->name('teacher_books');
/*
 * |--------------------------------------------------------------------------
 * |                        Teacher Route End                                |
 * |--------------------------------------------------------------------------
 * */

/*
 * |--------------------------------------------------------------------------
 * |                        Site Route                                    |
 * |--------------------------------------------------------------------------
 * */
/*Auth*/
Route::prefix('/site')->group(function (){
    Route::get('/login' , [SiteAdminController::class , 'index'])->name('login_form');
    Route::post('/login/owner' , [SiteAdminController::class , 'login'])->name('siteadmin.login');
    Route::get('/logout' , [SiteAdminController::class , 'siteLogout'])->name('siteadmin.logout')->middleware('site');
    Route::get('/register' , [SiteAdminController::class , 'SiteRegister'])->name('siteadmin.register');
    Route::post('/register/create' , [SiteAdminController::class , 'SiteRegisterCreate'])->name('siteadmin.register.create');
});

/*Auth End*/
Route::middleware('site')->group(function () {
    Route::get('/site', [BackController::class, 'index'])->name('site');
    Route::get('/site/company', [CompanyController::class, 'index'])->name('company');
    Route::get('/site/company/create', [CompanyController::class, 'create'])->name('company_create');
    Route::get('/site/header', [HeaderController::class, 'index'])->name('header');
    Route::get('/site/header/create', [HeaderController::class, 'create'])->name('header_create');
    Route::get('/site/color', [ColorController::class, 'index'])->name('color');
    Route::get('/site/color/create', [ColorController::class, 'create'])->name('color_create');
    Route::get('/site/about', [AboutController::class, 'index'])->name('about');
    Route::get('/site/about/create', [AboutController::class, 'create'])->name('about_create');
    Route::get('/site/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/site/gallery/create', [GalleryController::class, 'create'])->name('gallery_create');
    Route::get('/site/link', [LinkController::class, 'index'])->name('link');
    Route::get('/site/link/create', [LinkController::class, 'create'])->name('link_create');
    Route::resource('company', CompanyController::class);
    Route::resource('header', HeaderController::class);
    Route::resource('color', ColorController::class);
    Route::resource('about', AboutController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('link', LinkController::class);
});
/*
 * |--------------------------------------------------------------------------
 * |                        Site Route                                    |
 * |--------------------------------------------------------------------------
 * */
/*
 * |--------------------------------------------------------------------------
 * |                               Login                                     |
 * |--------------------------------------------------------------------------
 * */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
/*
 * |--------------------------------------------------------------------------
 * |                               Login  End                                |
 * |--------------------------------------------------------------------------
 * */
