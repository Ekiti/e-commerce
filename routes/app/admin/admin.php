<?php

Route::prefix('admin')->group(function() {
    // Orders Routes
    Route::get('/orders', 'Admin\OrderController@index')->name('orders.show');
    Route::get('/order/confirm', 'Admin\OrderController@confirmOrder');
    Route::get('/order/cancel', 'Admin\OrderController@cancelOrder');

    // Products Routes
    Route::resource('products', 'Admin\ProductController')->except('destroy')->middleware('shopRequired');
    Route::get('products/{product}/delete', 'Admin\ProductController@destroy')->name('products.destroy');

    // vendor Routes
    Route::resource('vendor', 'Admin\VendorController');

    //routes for super admin
    Route::group(['middleware'=>['superAdmin']], function(){
        Route::resource('settings', 'Admin\settingsController');
        Route::get('vendors',        'Admin\saController@displayVendors')->name('vendoors');
        Route::get('vendoor/verify', 'Admin\saController@verifyVendor')->name('verizone');
        Route::get('vendoor/block',  'Admin\saController@blockVendor')->name('friendzone');

        Route::get('/image/create', 'Admin\bannerController@create')->name('slider.create');
        Route::post('/image',       'Admin\bannerController@store')->name('slider.store');
        Route::get('/image/show',   'Admin\bannerController@show')->name('slider.show');
        Route::get('/image/{image_id}/delete', 'Admin\bannerController@destroy')->name('slider.destroy');
    
    });
    // Product Images
    Route::get('/images/create/{product_id}', 'Admin\ImageController@create')->name('images.create');
    Route::post('/images/{product_id}', 'Admin\ImageController@store')->name('images.store');
    Route::get('/products/{product_id}/images', 'Admin\ImageController@show')->name('images.show');
    Route::get('/products/{product_id}/images/{image_id}/delete', 'Admin\ImageController@destroy')->name('images.destroy');

    // Size Routes
    Route::resource('sizes', 'Admin\SizeController')->except('destroy')->middleware('shopRequired');
    Route::get('sizes/{size}/delete', 'Admin\SizeController@destroy')->name('sizes.destroy');

    // Sub category Routes
    Route::resource('subcategories', 'Admin\SubCategoryController')->except('destroy')->middleware('shopRequired');
    Route::get('subcategories/{subcategory}/delete', 'Admin\SubCategoryController@destroy')->name('subcategories.destroy');

    // Category Routes
    Route::resource('categories', 'Admin\CategoryController')->except('destroy')->middleware('shopRequired');
    Route::get('categories/{category}/delete', 'Admin\CategoryController@destroy')->name('categories.destroy');

    // Admin Login Routes.
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    // Admin Register Routes.
    Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

    // Password Reset Routes.
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    // Admin Home Routes
    Route::get('/', 'Admin\HomeController@index')->name('admin.index');
    Route::get('/dashboard', 'Admin\HomeController@dashboard')->name('admin.dashboard');

    Route::get('changepassword', 'Admin\changepasswordController@create')->name('changepasswordForm');
    Route::post('changepassword', 'Admin\changepasswordController@store')->name('changepassword');

    Route::get('profile', 'Admin\profileController@index')->name('profile');
    Route::get('editprofile', 'Admin\profileController@edit')->name('editprofile');
    Route::put('editprofile/{id}', 'Admin\profileController@update')->name('updateprofile.admin');
});