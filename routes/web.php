<?php

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

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');










Route::prefix('admin')->group(function(){
    Route::get('/', 'App\Http\Controllers\Admin\Auth\AdminLoginController@showLoginForm')->name('admin.loginredirect');
    Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('admin.dashboard');
    Route::get('/login', 'App\Http\Controllers\Admin\Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/logout', 'App\Http\Controllers\Admin\Auth\Admin\AdminLoginController@logout')->name('admin.logout');
    Route::post('/logout', 'App\Http\Controllers\Admin\Auth\AdminLoginController@logout')->name('admin.logout');
    Route::post('/login', 'App\Http\Controllers\Admin\Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/register', 'App\Http\Controllers\Admin\Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'App\Http\Controllers\Admin\Auth\AdminRegisterController@register')->name('admin.register.submit');

    /** Training Routes */
Route::get('trainings', [App\Http\Controllers\Admin\TrainingController::class, 'index'])->name('trainings.index');
Route::get('trainings/create', [App\Http\Controllers\Admin\TrainingController::class, 'create'])->name('trainings.create');
Route::post('trainings/store', [App\Http\Controllers\Admin\TrainingController::class, 'store'])->name('trainings.store');
Route::get('trainingdetails/{id}',[App\Http\Controllers\Admin\TrainingController::class, 'display'])->name('trainings.display');
Route::get('trainings/edit/{id}', [App\Http\Controllers\Admin\TrainingController::class, 'edit'])->name('trainings.edit');
Route::post('trainings/update', [App\Http\Controllers\Admin\TrainingController::class, 'update'])->name('trainings.update');

Route::get('getmyprofile', [App\Http\Controllers\Admin\EditProfileController::class, 'getmyprofile'])->name('getmyprofile');
Route::get('editprofile', [App\Http\Controllers\Admin\EditProfileController::class, 'editprofile'])->name('editprofile');
Route::put('updateprofile', [App\Http\Controllers\Admin\EditProfileController::class, 'updateprofile'])->name('update.profile');
Route::post('updatepassword', [App\Http\Controllers\Admin\EditProfileController::class, 'passwordupdate'])->name('update.password');
Route::get('upload-images', [App\Http\Controllers\Admin\EditProfileController::class, 'profilepicupdate'])->name('update.pic');


Route::get('/forget-password', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'getEmail']);
Route::post('/forget-password', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'postEmail'])->name('admin.forgotpassword');

Route::get('reset-password/{token}', 'App\Http\Controllers\Admin\Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'App\Http\Controllers\Admin\Auth\ResetPasswordController@updatePassword')->name('admin.resetpassword');


Route::post('categories/statusupdate/active', [App\Http\Controllers\Admin\CategoryController::class, 'statusupdateactive'])->name('category-status-active-update');
Route::post('categories/statusupdate/inactive', [App\Http\Controllers\Admin\CategoryController::class, 'statusupdateinactive'])->name('category-status-inactive-update');


/** Categories Routes */
Route::get('categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories.index');
Route::post('categories/create', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('categories.store');
Route::post('categories/statusupdate/active', [App\Http\Controllers\Admin\CategoryController::class, 'statusupdateactive'])->name('category-status-active-update');
Route::post('categories/statusupdate/inactive', [App\Http\Controllers\Admin\CategoryController::class, 'statusupdateinactive'])->name('category-status-inactive-update');


/** Quiz Management Routes */
Route::get('quiz/{id}', [App\Http\Controllers\Admin\QuizController::class, 'index'])->name('quiz.index');
Route::post('quiz/store', [App\Http\Controllers\Admin\QuizController::class, 'store'])->name('quizes.store');
Route::get('quizdelete/{id}', [App\Http\Controllers\Admin\QuizController::class, 'delete'])->name('quizes.delete');
Route::get('quizedit/{id}/edit', [App\Http\Controllers\Admin\QuizController::class, 'edit'])->name('quizes.edit');
Route::post('quizupdate/update', [App\Http\Controllers\Admin\QuizController::class, 'update'])->name('quizes.update');
Route::get('quizreport/{id}', [App\Http\Controllers\Admin\QuizController::class, 'report'])->name('quiz.report');


Route::post('resources/store', [App\Http\Controllers\Admin\ResourceController::class, 'store'])->name('resources.store');
Route::get('resourcedelete/{id}', [App\Http\Controllers\Admin\ResourceController::class, 'delete'])->name('resources.delete');
Route::get('resourceedit/{id}/edit', [App\Http\Controllers\Admin\ResourceController::class, 'edit'])->name('resources.edit');
Route::post('resourceupdate/update', [App\Http\Controllers\Admin\ResourceController::class, 'update'])->name('resources.update');



    /** Training Routes */
Route::get('userregistration', [App\Http\Controllers\Admin\UserRegistrationController::class, 'index'])->name('userregistration.index');
Route::get('userregistration/create', [App\Http\Controllers\Admin\UserRegistrationController::class, 'create'])->name('userregistration.create');
Route::post('userregistration/store', [App\Http\Controllers\Admin\UserRegistrationController::class, 'store'])->name('userregistration.store');
Route::get('userregistrationdetails/{id}',[App\Http\Controllers\Admin\UserRegistrationController::class, 'display']);
Route::get('userregistration/{id}/edit', [App\Http\Controllers\Admin\UserRegistrationController::class, 'edit'])->name('userregistration.edit');
Route::post('userregistration/update', [App\Http\Controllers\Admin\UserRegistrationController::class, 'update'])->name('userregistration.update');
Route::post('userregistration/statusupdate/active', [App\Http\Controllers\Admin\UserRegistrationController::class, 'statusupdateactive'])->name('user-status-active-update');
Route::post('userregistration/statusupdate/inactive', [App\Http\Controllers\Admin\UserRegistrationController::class, 'statusupdateinactive'])->name('user-status-inactive-update');

Route::get('userregistration/getcategories/{id}', [App\Http\Controllers\Admin\UserRegistrationController::class, 'getcategories'])->name('userregistration.getcategories');
Route::get('userregistration/getcompaniesedit/{id}', [App\Http\Controllers\Admin\UserRegistrationController::class, 'getcompaniesedit'])->name('userregistration.getcompanies');
Route::get('userregistration/gettrainingsedit/{id}', [App\Http\Controllers\Admin\UserRegistrationController::class, 'gettrainingsedit'])->name('userregistration.gettrainings');

Route::get('userregistration/usertraininglogs/{id}', [App\Http\Controllers\Admin\UserRegistrationController::class, 'getusertrainingslogs'])->name('userregistration.getusertrainingslogs');
Route::get('userregistration/usertrainingdetails/{id}', [App\Http\Controllers\Admin\UserRegistrationController::class, 'getusertrainingsdetails'])->name('userregistration.getusertrainingsdetails');

Route::get('userregistration/getfilterrecords', [App\Http\Controllers\Admin\UserRegistrationController::class, 'getfilterecords']);
Route::get('userregistration/getfilterrecords/getdate', [App\Http\Controllers\Admin\UserRegistrationController::class, 'getdatedrecords']);
Route::get('userregistration/getstatusrecords', [App\Http\Controllers\Admin\UserRegistrationController::class, 'getstatusrecords']);

Route::get('userregistration/getstatusrecords', [App\Http\Controllers\Admin\UserRegistrationController::class, 'getstatusrecords']);

Route::get('userregistration/gettrainings/{id}', [App\Http\Controllers\Admin\UserRegistrationController::class, 'gettrainings']);
Route::get('userregistration/getcompanies/{id}', [App\Http\Controllers\Admin\UserRegistrationController::class, 'getcompanies']);



Route::get('userregistration/getlogsfilterrecords/getdate', [App\Http\Controllers\Admin\UserRegistrationController::class, 'getlogsfilterrecords']);
    
Route::get('companies', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('companies.index');   
Route::post('companies/store', [App\Http\Controllers\Admin\CompanyController::class, 'store'])->name('companies.store');

Route::get('feedback', [App\Http\Controllers\Admin\FeedbackController::class, 'index'])->name('feedback.index');
Route::get('feedbackdetails/{id}',[App\Http\Controllers\Admin\FeedbackController::class, 'display']);

Route::get('payment', [App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('payment.index');

Route::get('companies', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('companies.index');
Route::get('companydetails/{id}',[App\Http\Controllers\Admin\CompanyController::class, 'display']);

Route::get('ajax-image-upload', [App\Http\Controllers\ajax_image_upload\ImageUploadController::class, 'index'])->name('ajax-image-upload');
Route::post('ajax-image-upload', [App\Http\Controllers\ajax_image_upload\ImageUploadController::class, 'store']);


});


// Vendor routes
Route::prefix('vendor')->group(function(){
   Route::get('/', 'App\Http\Controllers\User\Auth\VendorLoginController@showLoginForm')->name('vendor.loginredirect');
    Route::get('/dashboard', 'App\Http\Controllers\User\HomeController@index')->name('vendor.dashboard');
    Route::get('/login', 'App\Http\Controllers\User\Auth\VendorLoginController@showLoginForm')->name('vendor.login');
    Route::post('/logout', 'App\Http\Controllers\User\Auth\VendorLoginController@logout')->name('vendor.logout');
    Route::post('/login', 'App\Http\Controllers\User\Auth\VendorLoginController@login')->name('vendor.login.submit');
    Route::get('/register', 'App\Http\Controllers\User\Auth\VendorRegisterController@showRegisterForm')->name('vendor.register');
    Route::post('/register', 'App\Http\Controllers\User\Auth\VendorRegisterController@register')->name('vendor.register.submit');


    Route::get('getmyprofile', [App\Http\Controllers\User\EditProfileController::class, 'getmyprofile'])->name('vendor.getmyprofile');
    Route::get('editprofile', [App\Http\Controllers\User\EditProfileController::class, 'editprofile'])->name('vendor.editprofile');
    Route::put('updateprofile', [App\Http\Controllers\User\EditProfileController::class, 'updateprofile'])->name('user.update.profile');
   Route::post('updatepassword', [App\Http\Controllers\User\EditProfileController::class, 'passwordupdate'])->name('user.update.password');
   Route::get('upload-images', [App\Http\Controllers\User\EditProfileController::class, 'profilepicupdate'])->name('user.update.pic');

   Route::get('user-ajax-image-upload', [App\Http\Controllers\user_ajax_image_upload\ImageUploadController::class, 'index'])->name('user-ajax-image-upload');
Route::post('user-ajax-image-upload', [App\Http\Controllers\user_ajax_image_upload\ImageUploadController::class, 'store']);

Route::get('stripe',[App\Http\Controllers\User\CheckoutController::class, 'stripe']);
Route::post('stripe',[App\Http\Controllers\User\CheckoutController::class, 'stripePost'])->name('stripe.post');

 Route::get('trainings/{id}', [App\Http\Controllers\User\ResourceController::class, 'gettrainingdescription'])->name('user.trainings.index');

 Route::get('trainingdetails/{id}', [App\Http\Controllers\User\ResourceController::class, 'index'])->name('user.trainingdetails.index');
 Route::get('getresourcedata/{id}/view', [App\Http\Controllers\User\ResourceController::class, 'view_resource'])->name('user.trainingdetails.view');
 Route::get('trainingattempts/{attempt}', [App\Http\Controllers\User\ResourceController::class, 'update_attempt_status'])->name('user.trainingdetails.attempts');
 Route::get('trainingcompleted/{completed}', [App\Http\Controllers\User\ResourceController::class, 'update_completed_status'])->name('user.trainingdetails.completed');
 Route::get('getquestion', [App\Http\Controllers\User\ResourceController::class, 'get_question'])->name('user.trainingdetails.get_question');

  Route::post('answercheck', [App\Http\Controllers\User\ResourceController::class, 'answercheck'])->name('user.quiz.answercheck');
  Route::post('answersubmit', [App\Http\Controllers\User\ResourceController::class, 'answersubmit'])->name('user.quiz.answersubmit');

  Route::get('trainingreport/{id}', [App\Http\Controllers\User\ResourceController::class, 'training_report'])->name('user.trainingreport.index');

    Route::get('mytrainings', [App\Http\Controllers\User\ResourceController::class, 'my_trainings'])->name('user.trainingdetails.my_trainings');

    Route::get('viewcertificate/{training_user_id}', [App\Http\Controllers\User\ResourceController::class, 'view_certicate'])->name('user.trainingdetails.view_certicate');

    Route::get('downloadcertificate/{training_user_id}', [App\Http\Controllers\User\ResourceController::class, 'createPDF'])->name('user.trainingdetails.download_certicate');



});

    Route::get('contact', [App\Http\Controllers\User\ResourceController::class, 'my_trainings'])->name('contact');