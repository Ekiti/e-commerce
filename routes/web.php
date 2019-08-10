<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
@include('app/admin/admin.php'); //Routes for the admin.
@include('app/store/store.php'); // Routes for the store.
/*
    Route that handles all the logics on the landing page.
    check [•]
*/
Route::get('/', 'indexController@getindex')->name('user.index');
Route::get('/{slug}/{sku}', 'indexController@getProductDetail')->name('product.detail')->where('sku', '[A-Z0-9]+');


Auth::routes();
/* 
    Route for profile.
    The profile is simple the username & email used during registration.
    there is no creating of profile. just displaying the profile and updating it.
    check [•]
*/
Route::resource('profile', 'profileController');
/* 
    Route for Delivery Addresses
    This route handles CRU of delivery addresses for customers
    check [•]
*/
Route::resource('address', 'addressController');
/*
    Route for changing of user passwords
    check [•]
*/
Route::get('changepassword', 'changePasswordController@getChangepassword')->name('user.changePasswordForm');
Route::post('changepassword', 'changePasswordController@postChangepassword')->name('user.changePassword');
/* 
    Route that handles loging users out
    check [•]
*/
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/recept', function(){
    return view('user.reciept');
});