<?php

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
Route::get('/','AdminAuth\LoginController@showLoginForm');
Route::get('login/facebook', 'AdminAuth\LoginController@redirectToProviderFacebook');
Route::get('login/facebook/callback', 'AdminAuth\LoginController@handleProviderCallbackFacebook');
Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
Route::post('/register', 'AdminAuth\RegisterController@register');
Route::get('/vendor' , 'VendorController@showLoginForm');
Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::get('/logout', 'AdminAuth\LoginController@logout');



  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
  Route::get('/home','Admin\HomeController@home');
  Route::group(['namespace'=>'Admin'],function(){

                          // Gym routes

    // View Gyms
    Route::get('gyms-all','GymsController@allGym')->name('gyms.index');
 // edit Gym
    Route::get('edit-gyms/{id}','GymsController@editGym')->name('gyms.edit');
    Route::put('edit-gyms/{id}','GymsController@update')->name('gyms.update');

 // delete Gym
    Route::delete('delete-gym/{id}','GymsController@destroy')->name('gyms.destroy');

    // Add Gym
    Route::get('add-gym','GymsController@addGym')->name('add-gym');
    Route::post('add-gym','GymsController@storeGym')->name('add-gym');

    Route::get('manage-users','CustomersController@manageUsers')->name('manage-users');
    Route::get('manage-users/{id}','CustomersController@show')->name('manage-users.show');
    Route::delete('manage-users/{id}','CustomersController@destroy')->name('manage-users.destroy');

//video orders
    Route::get('product-orders','OrderController@productindex')->name('product-orders');
    Route::get('video-orders','OrderController@videoindex')->name('video-orders');
    Route::delete('product-order/{id}','OrderController@productdestroy')->name('product-orders.destroy');
    Route::delete('video-order/{id}','OrderController@videodestroy')->name('video-orders.destroy');

    Route::get('transactions','TransactionController@index')->name('transactions.index');
    Route::delete('transactions/{id}','TransactionController@destroy')->name('transactions.destroy');


    Route::get('affiliate-partners','AffiliatePartnerController@viewAllOrders')
    ->name('affiliate-partners');

    // Partners Controller
    Route::get('add-partner','PartnerController@addPartner')->name('add-partner');
    Route::post('add-partner','PartnerController@storePartner')->name('add-partner');
  //Update Partners Controller
    Route::get('edit-partner/{id}','PartnerController@edit')->name('partner.edit');
    Route::put('edit-partner/{id}','PartnerController@update')->name('partner.update');
   Route::delete('delete-partner/{id}','PartnerController@update')->name('partner.destroy');

    // Upload Tutorial Controller
    Route::get('upload-tutorial-all','TutorialController@index')->name('tutorials.index');
    Route::get('upload-tutorial','TutorialController@uploadTutorial')->name('upload-tutorial');
    Route::post('upload-tutorial','TutorialController@storeTutorial')->name('upload-tutorial');
    Route::get('upload-tutorial/edit/{id}','TutorialController@edit')->name('upload-tutorial.edit');
    Route::get('upload-tutorial/{id}','TutorialController@show')->name('upload-tutorial.show');
    Route::put('upload-tutorial/{id}','TutorialController@update')->name('upload-tutorial.update');
  Route::delete('upload-tutorial/{id}','TutorialController@destroy')->name('upload-tutorial.destroy');


    // Product Controller
    Route::get('products','ProductsController@index')->name('product.index');
    Route::get('add-product','ProductsController@addProduct')->name('add-product');
    Route::post('add-product','ProductsController@storeProduct')->name('add-product');
    Route::get('product/edit/{id}','ProductsController@edit')->name('product.edit');
    Route::put('product/{id}','ProductsController@update')->name('product.update');
    Route::delete('product/{id}','ProductsController@destroy')->name('product.destroy');

    //exercise library
    Route::resource('exercise-lib','ExerciseLibraryController');

  });
});

Route::group(['prefix' => 'gym'], function () {
  Route::get('/login', 'GymAuth\LoginController@showLoginForm');
  Route::post('/login', 'GymAuth\LoginController@login');
  Route::post('/logout', 'GymAuth\LoginController@logout');

  Route::get('/register', 'GymAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'GymAuth\RegisterController@register');

  Route::post('/password/email', 'GymAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'GymAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'GymAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'GymAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'partner'], function () {
  Route::get('/login', 'PartnerAuth\LoginController@showLoginForm');
  Route::post('/login', 'PartnerAuth\LoginController@login');
  Route::post('/logout', 'PartnerAuth\LoginController@logout');

  Route::get('/register', 'PartnerAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'PartnerAuth\RegisterController@register');

  Route::post('/password/email', 'PartnerAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'PartnerAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'PartnerAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'PartnerAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'customer'], function () {
  Route::get('/login', 'CustomerAuth\LoginController@showLoginForm')->name('customer.login');
  Route::post('/login', 'CustomerAuth\LoginController@login');
  Route::post('/logout', 'CustomerAuth\LoginController@logout')->name('customer.logout');
  Route::get('/register', 'CustomerAuth\RegisterController@showRegistrationForm')->name('customer.register');
  Route::post('/register', 'CustomerAuth\RegisterController@register');
  Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail')->name('customer.password.request');
  Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset')->name('customer.password.email');
  Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm')->name('customer.password.reset');
  Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'influence'], function () {
  Route::get('/login', 'InfluenceAuth\LoginController@showLoginForm')->name('influence.login');
  Route::post('/login', 'InfluenceAuth\LoginController@login');
  Route::post('/logout', 'InfluenceAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'InfluenceAuth\RegisterController@showRegistrationForm')->name('influence.register');
  Route::post('/register', 'InfluenceAuth\RegisterController@register');

  Route::post('/password/email', 'InfluenceAuth\ForgotPasswordController@sendResetLinkEmail')->name('influence.password.request');
  Route::post('/password/reset', 'InfluenceAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'InfluenceAuth\ForgotPasswordController@showLinkRequestForm')->name('influence.password.reset');
  Route::get('/password/reset/{token}', 'InfluenceAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'employee'], function () {
  Route::get('/login', 'EmployeeAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'EmployeeAuth\LoginController@login');
  Route::post('/logout', 'EmployeeAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'EmployeeAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'EmployeeAuth\RegisterController@register');

  Route::post('/password/email', 'EmployeeAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'EmployeeAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'EmployeeAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'EmployeeAuth\ResetPasswordController@showResetForm');
});



Route::group(['namespace'=>'Customer','prefix'=>'customer'],function(){

Route::resource('posts','PostController');
Route::get('customer-all-allgym','GymController@index')->name('customer.all.allgym');
Route::get('user-transaction','TransactionController@index')->name('user-transaction');
Route::get('customer-product','ProductController@index')->name('customer-product');
Route::get('policy','PolicyController@index')->name('policy');

});
