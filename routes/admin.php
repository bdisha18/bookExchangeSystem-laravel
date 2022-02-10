<?php
use Illuminate\Http\Request;

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

Auth::routes(['verify'=> true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');




Route::group(['prefix' => 'admin', 'namespace' => 'Backend' ], function() {
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');


});

// for User
Route::group(['namespace' => 'Backend', 'prefix' => 'admin/user', 'middleware' => 'auth'], function() {
    Route::get('/index', 'UserController@index')->name('users.index');
    Route::post('/status/{id}', 'UserController@status')
    ->name('users.status');
    Route::get('/view/{id}', 'UserController@view')->name('users.view');
    Route::get('/edit/{id}', 'UserController@edit')->name('users.edit');
    Route::post('/update/{id}', 'UserController@update')->name('users.update');
    Route::get('/status', 'UserController@status')->name('users.status');
    Route::get('/user-interest/{id}', 'UserController@users_interest')->name('users.interest');
    Route::get('/user-favorite/{id}', 'UserController@users_favorite')->name('users.favorite');
   Route::get('/user-favorite-view/{id}', 'UserController@users_favorite_view')->name('users.favorite.view');
    Route::get('/user-cart/{id}', 'UserController@users_cart')->name('users.cart');

  
});

// for Admin
Route::group(['namespace' => 'Backend', 'prefix' => 'admin/admin' , 'middleware' => 'auth'], function() {
    Route::get('/index', 'AdminController@index')->name('admin.index');
    Route::post('/status/{id}', 'AdminController@status')
    ->name('admin.status');
    Route::get('/edit/{id}', 'AdminController@edit')->name('admin.edit');
    Route::post('/update/{id}', 'AdminController@update')->name('admin.update');
    Route::delete('/delete/{id}', 'AdminController@delete')->name('admin.delete');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    
});

  //for Books
 Route::group(['namespace' => 'Backend', 'prefix' => 'admin/book', 'middleware' => 'auth'], function() {
    Route::get('/index', 'BookController@index')->name('book.index');
    Route::post('/status/{id}', 'BookController@status')
    ->name('book.status');
    Route::get('/create','BookController@create')->name('book.create');
    Route::post('/store','BookController@store')->name('book.store');
     Route::get('/view/{id}', 'BookController@view')->name('book.view');
     Route::get('/edit/{id}', 'BookController@edit')->name('book.edit');
   Route::post('/update/{id}', 'BookController@update')->name('book.update');
    Route::delete('/delete/{id}', 'BookController@delete')->name('book.delete');
    
 });

//for Publisher
Route::group(['namespace' => 'Backend', 'prefix' => 'admin/publisher', 'middleware' => 'auth'],
function() {
    Route::get('/index', 'PublisherController@index')->name('publisher.index');
    Route::get('/create', 'PublisherController@create')->name('publisher.create');
    Route::post('/store', 'PublisherController@store')->name('publisher.store');
    Route::get('/view/{id}', 'PublisherController@view')->name('publisher.view');
    Route::get('/edit/{id}', 'PublisherController@edit')->name('publisher.edit');
    Route::post('/update/{id}', 'PublisherController@update')->name('publisher.update');
    Route::delete('/delete/{id}', 'PublisherController@delete')->name('publisher.delete');
    Route::post('/status/{id}', 'PublisherController@status')->name('publisher.status');
});
   
//for transaction
Route::group(['namespace' => 'Backend', 'prefix' => 'admin/transaction', 'middleware' => 'auth'],
function() {
    Route::get('/index', 'TransactionController@index')->name('transaction.index');
    Route::post('/status/{id}', 'TransactionController@status')
    ->name('transaction.status');
    Route::get('/view/{id}', 'TransactionController@view')->name('transaction.view');
    Route::get('/edit/{id}', 'TransactionController@edit')->name('transaction.edit');
    Route::post('/update/{id}', 'TransactionController@update')->name('transaction.update');
    Route::delete('/delete/{id}', 'TransactionController@delete')->name('transaction.delete');
});

//for offers
Route::group(['namespace' => 'Backend', 'prefix' => 'admin/offer', 'middleware' => 'auth'],
function() {
    Route::get('/index', 'OfferController@index')->name('offer.index');
    Route::post('/status/{id}', 'OfferController@status')
    ->name('offer.status');
        Route::get('/create', 'OfferController@create')->name('offer.create');
    Route::post('/store', 'OfferController@store')->name('offer.store');

    Route::get('/view/{id}', 'OfferController@view')->name('offer.view');
    Route::get('/edit/{id}', 'OfferController@edit')->name('offer.edit');
    Route::post('/update/{id}', 'OfferController@update')->name('offer.update');
    Route::delete('/delete/{id}', 'OfferController@delete')->name('offer.delete');
});

//for email
Route::group(['namespace' => 'Backend', 'prefix' => 'admin/email', 'middleware' => 'auth'],
function() {
    Route::get('/index', 'EmailController@index')->name('email.index');
    Route::post('/status/{id}', 'EmailController@status')
    ->name('email.status');
        Route::get('/create', 'EmailController@create')->name('email.create');
    Route::post('/store', 'EmailController@store')->name('email.store');

    Route::get('/view/{id}', 'EmailController@view')->name('email.view');
    Route::delete('/delete/{id}', 'EmailController@delete')->name('email.delete');
});

//for Email Template
Route::group(['namespace' => 'Backend', 'prefix' => 'admin/emailtemplate', 'middleware' => 'auth'],
function() {
    Route::get('/index', 'EmailTemplateController@index')->name('template.index');
        Route::get('/create', 'EmailTemplateController@create')->name('template.create');
    Route::post('/store', 'EmailTemplateController@store')->name('template.store');

    Route::get('/view/{id}', 'EmailTemplateController@view')->name('template.view');
    Route::get('/edit/{id}', 'EmailTemplateController@edit')->name('template.edit');
    Route::post('/update/{id}', 'EmailTemplateController@update')->name('template.update');
    Route::delete('/delete/{id}', 'EmailTemplateController@delete')->name('template.delete');
});

//for Categories
Route::group(['namespace' => 'Backend', 'prefix' => 'admin/categories', 'middleware' => 'auth'],
function() {
    Route::get('/index', 'CategoryController@index')->name('category.index');
    Route::get('/create', 'CategoryController@create')->name('category.create');
    Route::post('/store', 'CategoryController@store')->name('category.store');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('/update/{id}', 'CategoryController@update')->name('category.update');
    Route::delete('/delete/{id}', 'CategoryController@delete')->name('category.delete');
});

 //for Testimonials
 Route::group(['namespace' => 'Backend', 'prefix' => 'admin/testimonial', 'middleware' => 'auth'],
 function() {
     Route::get('/index', 'TestimonialController@index')->name('testimonial.index');
     Route::get('/create', 'TestimonialController@create')->name('testimonial.create');
     Route::post('/store', 'TestimonialController@store')->name('testimonial.store');

     Route::get('/view/{id}', 'TestimonialController@view')->name('testimonial.view');
     Route::get('/edit/{id}', 'TestimonialController@edit')->name('testimonial.edit');
     Route::post('/update/{id}', 'TestimonialController@update')->name('testimonial.update');
     Route::delete('/delete/{id}', 'TestimonialController@delete')->name('testimonial.delete');
 });


//for Address
Route::group(['namespace' => 'Backend', 'prefix' => 'admin/address', 'middleware' => 'auth'],
function() {
    Route::get('/index', 'AddressController@index')->name('addresses.index');
     Route::post('/status/{id}', 'AddressController@status')
    ->name('addressess.status');
    Route::get('/create', 'AddressController@create')->name('addresses.create');
    Route::post('/store', 'AddressController@store')->name('addresses.store');

    Route::get('/view/{id}', 'AddressController@view')->name('addresses.view');
    Route::get('/edit/{id}', 'AddressController@edit')->name('addresses.edit');
    Route::post('/update/{id}', 'AddressController@update')->name('addresses.update');
    Route::delete('/delete/{id}', 'AddressController@delete')->name('addresses.delete');
});


 //for Orders
 Route::group(['namespace' => 'Backend', 'prefix' => 'admin/order', 'middleware' => 'auth'],
 function() {
     Route::get('/index', 'OrderController@index')->name('orders.index');
      Route::post('/status/{id}', 'OrderController@status')
    ->name('orders.status');
        Route::get('/create', 'OrderController@create')->name('orders.create');
     Route::post('/store', 'OrderController@store')->name('orders.store');

     Route::get('/view/{id}', 'OrderController@view')->name('orders.view');
     Route::get('/edit/{id}', 'OrderController@edit')->name('orders.edit');     
     Route::post('/update/{id}', 'OrderController@update')->name('orders.update');
     Route::get('/detail/{id}','OrderController@detail')->name('orders.detail');
 });

    //for Interest
    Route::group(['namespace' => 'Backend', 'prefix' => 'admin/interest', 'middleware' => 'auth'],
    function() {
    Route::get('/index', 'InterestController@index')->name('interest.index');
        Route::get('/create', 'InterestController@create')->name('interest.create');
    Route::post('/store', 'InterestController@store')->name('interest.store');
    Route::get('/edit/{id}', 'InterestController@edit')->name('interest.edit');
    Route::post('/update/{id}', 'InterestController@update')->name('interest.update');
    Route::delete('/delete/{id}', 'InterestController@delete')->name('interest.delete');
});


     //for Contact
    Route::group(['namespace' => 'Backend', 'prefix' => 'admin/contact', 'middleware' => 'auth'],
    function() {
    Route::get('/index', 'ContactController@index')->name('contact.index');
    Route::get('/view/{id}', 'ContactController@view')->name('contact.view');
    Route::delete('/delete/{id}', 'ContactController@delete')->name('contact.delete');
});







