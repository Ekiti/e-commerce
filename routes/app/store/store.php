<?php
Route::group(['prefix'=>'contents'], function(){
    Route::get('about',   'contentController@getAbout')->name('content.about');
    Route::get('contact', 'contentController@getContact')->name('content.contact');
    Route::get('faqs',    'contentController@getFaqs');
    Route::get('terms',   'contentController@getTerms')->name('content.terms');
    Route::get('policy',  'contentController@getPolicy');
    Route::get('help',    'contentController@getHelp');
});
Route::get('/verifypayment/{ref}','verifypaymentController@vfy')->name('verifypayment');
Route::get('/B/{brandName}','brandController@vfy')->name('mybrands');
Route::get('/category/{category}/{subcategory}', 'Store\HomeController@getSubCategory')->name('store.subcategory.index')->where('subcategory', '[a-z]+');
Route::get('/category/{category}', 'Store\HomeController@getCategory')->name('store.category.index')->where('category', '[a-z]+');
Route::get('/seller/{seller}', 'Store\HomeController@getSeller')->name('store.getSeller')->where('seller', '[a-z]+');
Route::get('search', 'queryController@search')->name('query.search');
Route::resource('query', 'queryController');
Route::get('order', 'Store\OrderController@displayOrders')->name('user.orders');
Route::post('/cart/remove-one', 'Store\CartController@removeOne')->name('store.cart.remove.one');
Route::get('/cart', 'Store\CartController@index')->name('store.cart');
Route::resource('/cart', 'Store\CartController')->except(['index', 'store']);
Route::resource('checkout', 'Store\checkoutController');