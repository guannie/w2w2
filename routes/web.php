<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//user
Route::get('/user', 'UserController@index');
Route::get('/user/detail', 'UserController@show');
Route::post('/user/add', 'UserController@store');
Route::post('/user/update', 'UserController@update');
Route::delete('/user/delete', 'UserController@destroy');
Route::post('/user/addpackage', 'UserController@addpackage');

//package
Route::get('/packages', 'PackageController@index');
Route::get('/packages/detail', 'PackageController@show');
Route::post('/packages/add', 'PackageController@store');
Route::post('/packages/update', 'PackageController@update');
Route::delete('/packages/delete', 'PackageController@destroy');

//token
Route::get('/token', 'TokenController@index');
Route::get('/token/detail', 'TokenController@show');
Route::post('/token/add', 'TokenController@store');
Route::post('/token/update', 'TokenController@edit');
Route::delete('/token/delete', 'TokenController@destroy');
Route::post('/token/addtoken', 'TokenController@addtoken');
Route::post('/token/give', 'TokenController@givetoken');


//inbox
Route::get('/inbox', 'InboxController@index');
Route::get('/inbox/detail', 'InboxController@show');
Route::post('/inbox/add', 'InboxController@store');
Route::post('/inbox/update', 'InboxController@edit');
Route::delete('/inbox/delete', 'InboxController@destroy');

//news
Route::get('/news', 'NewsController@index');
Route::get('/news/detail', 'NewsController@show');
Route::get('/news/status', 'NewsController@status');
Route::post('/news/add', 'NewsController@store');
Route::post('/news/update', 'NewsController@update');
Route::delete('/news/delete', 'NewsController@destroy');

//login
Route::post('/login', 'LoginController@signin');



//product
Route::get('/product', 'ProductController@index');
Route::get('/product/listcategory', 'ProductController@listcategory');
Route::get('/product/listuserproduct', 'ProductController@listuserproduct');
Route::get('/product/productstatus', 'ProductController@productstatus');
Route::post('/product/add','ProductController@store');
Route::post('/product/update','ProductController@update');
Route::delete('/product/delete','ProductController@destroy');
Route::get('/product/detail','ProductController@show');
Route::get('/product/type','ProductController@mainstatus');
Route::get('/product/usertype','ProductController@usertype');
Route::get('/listing','ProductController@premiumlist');

//admin
Route::post('/admin/approve','AdminController@approve');
Route::post('/admin/reject','AdminController@reject');
Route::get('/admin/list','AdminController@listapproval');
Route::post('/admin/block','UserController@block');
Route::post('/admin/unblock','UserController@unblock');



//category
Route::post('/category/add','CategoryController@addcategory');
Route::get('/category','CategoryController@listcategory');
Route::get('/category/sub','CategoryController@listsubcategory');
Route::delete('/category/delete','CategoryController@delete');
Route::get('/category/mainstatus','CategoryController@mainstatus');
Route::get('/category/substatus','CategoryController@substatus');

//comment
Route::post('/comment','CommentController@addcomment');
Route::get('/comment/list','CommentController@listcomment');
Route::delete('/comment/delete','CommentController@delete');
Route::post('/comment/hide','CommentController@hidecomment');
Route::post('/comment/unhide','CommentController@unhide');

//enquiry
Route::post('/enquiry','EnquiryController@store');
Route::get('/enquiry/list','EnquiryController@list');
Route::delete('/enquiry/delete','EnquiryController@delete');
Route::get('/enquiry/detail','EnquiryController@detail');

//banner
Route::post('/banner','BannerController@store');
Route::get('/banner/list','BannerController@list');
Route::get('/banner/status','BannerController@status');
Route::delete('/banner/delete','BannerController@delete');
Route::get('/banner/detail', 'BannerController@detail');
Route::post('/banner/edit','BannerController@edit');

//notification
Route::get('/notification','ProductController@listapproved');
Route::get('/notification/expired','ProductController@listexpired');





//reservation
Route::post('/reserve','ReserveController@reserve');
Route::get('/reserve/list','ReserveController@listreserved');
Route::post('reserve/approve','ReserveController@approve');
Route::get('/reserve/listapprove','ReserveController@listapproved');
Route::post('reserve/reject','ReserveController@reject');
Route::get('/reserve/listrejected','ReserveController@listrejected');
Route::post('reserve/confirm','ReserveController@confirm');
Route::post('reserve/cancel','ReserveController@cancel');
Route::get('/reserve/listconfirmed','ReserveController@listconfirmed');
Route::get('/reserve/listcanceled','ReserveController@listcanceled');
Route::post('reserve/complete','ReserveController@complete');
Route::get('/reserve/listcompleted','ReserveController@listcompleted');

//review
Route::post('/review','ReviewController@store');
Route::delete('/review/delete','ReviewController@delete');
Route::get('/review/list','ReviewController@list');

//mailing
Route::post('/email','EmailController@mail');

//log
Route::get('/log','LogController@list');
Route::get('/log/detail','LogController@detail');
Route::delete('/log/delete','LogController@delete');
Route::get('/log/type','LogController@type');
    





 
