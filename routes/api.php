<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/workout-buddy-list', 'ApiController@getWorkoutDetails');
Route::post('/get-user-buddies' , 'ApiController@getBuddies');
Route::post('/remove-user-buddies' , 'ApiController@removeUserBuddies');
Route::post('/create-user-workout' , 'ApiController@createWorkout');
Route::post('/user-workout-list' , 'ApiController@getUserWorkoutList');
Route::post('/user-buddies-list' , 'ApiController@getUserBuddyList');
Route::post('/influence-user-statistics' , 'ApiController@getInfluenceUsers');
Route::post('/exercise-library' , 'ApiController@getExerciseLibrary');


Route::group(['namespace'=>'apicontrollers'],function(){


    Route::post('admin-login','AdminController@adminlogin');

    // Admin Login controller (SIGN IN)
    Route::post('/login','UsersController@login');

  	// Send verification code
    Route::post('send-code','UsersController@sendcode');

    // Confirm Verification Code
    Route::post('confirm','UsersController@confirm');
    //add lib

    Route::post('add-lib','LibraryController@store');

    Route::get('lib/{id}','LibraryController@single')->name('libsingle');
    Route::get('view-video/{id}','LibraryController@addview');

    Route::get('like-video/{id}','LibraryController@likevideo');
    //get lib

    Route::get('exercise-lib','LibraryController@index');

    //create workout
    Route::post('create-workout','WorkoutController@store');

    //check my work
    Route::get('my-workout/{id}','WorkoutController@show');
    //workout Detail
    Route::get('workout-detail/{id}','WorkoutController@detail');

    //workout Detail
    Route::get('all-workout-detail','WorkoutController@alldetail');
    // Reset Password
    Route::post('reset-password','UsersController@updatepassword');
    //addd buddy wrkout
    Route::post('add-buddy-workout','BuddyWorkoutController@store');
    Route::get('delete-buddy-workout/{id}','BuddyWorkoutController@delete')->name('deletebuddy');
    //show Workout Buddy

    Route::get('my-buddy-workout/{id}','BuddyWorkoutController@mybuddy');

    Route::get('all-buddy-invite/{id}','BuddyWorkoutController@allbuddy');

    Route::get('accept-workout-buddy/{id}','BuddyWorkoutController@accept')->name('accept-buddy-workout');

    Route::get('reject-workout-buddy/{id}','BuddyWorkoutController@reject')->name('reject-buddy-workout');

    //create workout list
    Route::post('create-workout-list','WorkoutController@createlist');
    //add video to workoutlist
    Route::post('add-video-workout-list','WorkoutController@addvideo');
    // Add Gym
    Route::post('add-gym','GymsController@addgym');

    Route::post('gym-login','GymsController@login');

    // Recents Gym
    Route::get('recents-gym','GymsController@recent');

    // Recents Gym
    Route::get('approve-gym/{id}','GymsController@approve');

    // Delete Recent Gym
    Route::get('delete-gym/{id}','GymsController@delete');

    // See all Gyms
    Route::get('seeall-gyms','GymsController@seeall');

    // Gym Detail
    Route::get('gym-detail/{id}','GymsController@show');

    // New Gyms
    Route::get('new-gyms','GymsController@newgyms');

    //find gym

    Route::get('find-gym/{name}','GymsController@findgym');

    Route::get('all-gyms','GymsController@allgyms');

    //gym with paginate

    Route::get('all-gyms/{number}','GymsController@gympaginate');

    // Existing Gyms
    Route::get('existing-gyms','GymsController@existinggyms');

    // User Registeration
    Route::post('user-register','CustomersController@register');

    // User Login
    Route::post('user-login','CustomersController@userlogin');

    // Send verification code
    Route::post('sendcode','CustomersController@sendcode');

    // Confirm Verification Code
    Route::post('confirm-code','CustomersController@confirm');

    // Reset Password
    Route::post('update-password','CustomersController@updatepassword');

    // Create Posts
    Route::post('new-post','PostsController@posts');
    Route::get('post/{id}','PostsController@Singlepost')->name('postsin');
    // Get Posts
    Route::get('all-posts','PostsController@postsdata');

    // Like Dislike
    Route::post('actions','ActionController@action');

    // Comment system
    Route::apiresource('comments','CommentsController');

    // Shares post
    Route::post('share','SharesController@share');

    // Faq questions
    Route::apiresource('faq','FaqquestionsController');

    // Faq questions update
    Route::post('faq-update','FaqquestionsController@updaterecord');

    // Faq questions delete
    Route::post('faq-delete','FaqquestionsController@deleterecord');

    // Add Feedback
    Route::post('add-feedback','FeedbackController@Addfeedback');

    // Users Feedback
    Route::get('users-feedback','FeedbackController@usersFeedback');

    // Delete Feedback
    Route::get('delete-feedback/{id}','FeedbackController@delFeedback');
Route::post('tag-user','CustomersController@taguser');
    // Send Contact us
    Route::post('contact-us','ContactusController@sendinfo');

    // Report a bug
    Route::post('report-bugs','BugsController@bugs');

    // Bugs List
    Route::get('bugs-list','BugsController@bugslist');
Route::get('change-user-notification/{id}','UserNotificationController@changeusernotification');
    // Delete Bug
    Route::get('delete-bug/{id}','BugsController@delBug');

    // All users list
    Route::get('users-list','CustomersController@manageusers');
    Route::get('gym-stat','CustomersController@gymstat');

    Route::post('gym-stat','CustomersController@gymstato');
    // Delete a user
    Route::get('delete-user/{id}','CustomersController@deleteUser');
    Route::get('check-balance/{id}','CustomersController@amount');
    // User Profile
    Route::get('user-profile/{id}','CustomersController@userprofile')->name('userprofile');
    //update user profile
    Route::post('user-profile-update/{id}','CustomersController@updateprofile');

    // Add new Product
    Route::post('add-product','ProductsController@addproduct');

    // All Products
    Route::get('all-products','ProductsController@allproducts');

    // Product Types
    Route::get('product-types','ProductsController@producttypes');

    // Product Types related products
    Route::get('related-products/{type}','ProductsController@relatedproducts')
    ->name('related-products');
    // add Folow
    Route::post('follow','FollowController@follow');

    //post follow
    Route::post('post-follow','FollowController@postfollow');

    // un follow

    Route::post('un-follow','FollowController@unfollow');

    //Add Payment

    Route::post('payment','PaymentController@payment');

    //show notificaton
    Route::get('user-notification/{id}','UserNotificationController@usernotification');

    //All Influences

    Route::get('influence','InfluenceController@index');

    //Add Influence
    Route::post('influence','InfluenceController@store');

    //Show Single Profile Influence

    Route::get('influence/{id}','InfluenceController@show');

    //Update Profile
    Route::post('influence/{id}','InfluenceController@update');

    //Delete Influence
    Route::delete('influence/{id}','InfluenceController@destroy');

    //All Partner

    Route::get('partner','PartnersController@index');

    //Add Partner
    Route::post('partner','PartnersController@store');

    //Show Single Profile Partner

    Route::get('partner/{id}','PartnersController@show');

    //Update Partner
    Route::post('partner/{id}','PartnersController@update');

    //Delete Partner
    Route::delete('partner/{id}','PartnersController@destroy');

    //Add Partner
    Route::post('tutorial','TutorialController@store');

    //free video

    Route::get('free-video','TutorialController@freevideo');

    //Paid Videos

    Route::get('paid-video','TutorialController@paidvideo');

    //get policy

    Route::get('policy','PolicyController@policy');

    //edit policy

    Route::post('edit-policy','PolicyController@editpolicy');

    //get about

    Route::get('about','AboutController@about');

    //edit about

    Route::post('edit-about','AboutController@editabout');

    //add Employee

    Route::post('add-employee','EmployeeController@addemployee');

    //Edit Employee

    Route::post('edit-employee/{id}','EmployeeController@editemployee');


    Route::post('gym-contact-us','ContactusController@contactsave');

    Route::get('all-followeing/{id}','FollowController@allfollowing');

    Route::get('all-follower/{id}','FollowController@allfollower');

    /// add Location

    Route::get('all-location/{id}','LocationController@location')->name('all-location');

    Route::post('add-location','LocationController@store');

    //All employee

    Route::get('all-employee','EmployeeController@show');

    Route::post('product-order','ProductOrderController@store');

    Route::get('all-product-order','ProductOrderController@allorder');
    Route::get('change-product-order/{id}','ProductOrderController@changeorder');
    Route::get('pending-product-order','ProductOrderController@pendingorder');

    Route::post('video-order','VideoOrderController@store');
    Route::get('all-video-order','VideoOrderController@allorder');
    Route::get('pending-video-order','VideoOrderController@pendingorder');
    Route::get('change-video-order/{id}','ProductOrderController@changeorder');


    Route::post('stripe-product-order','StripePaymentController@stripePostProduct');

    Route::post('stripe-video-order','StripePaymentController@stripePostvideo');

    Route::post('stripe-deposit-amount','StripePaymentController@stripedeposit');

    Route::get('all-transaction','ProductOrderController@alltransaction');
    Route::get('gym-user-check-history/{id}','UserCheckController@checkhistory');
    Route::get('gym-user-check-in-history/{id}','UserCheckController@checinkhistory');
    Route::get('gym-user-check-out-history/{id}','UserCheckController@checkouthistory');

    Route::get('gym-notification/{id}','ProductOrderController@gymnoti');
});
