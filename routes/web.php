<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);//通常ページ、ログインしなくても見れるページ、開発中はOFF
//userpage
// Route::get('/user/passwordchange', 'UserpageController@ChangePasswordForm')->name('password.form');
// Route::post('/user/passwordchange', 'UserpageController@ChangePassword')->name('password.change');
// Route::get('/user', 'UserpageController@show')->name('userpage');
// Route::get('/user/itemfav', 'UserpageController@itemfav')->name('useritemfav');
// Route::post('/user/patch', 'UserpageController@patch')->name('userpatch');
// //toppage
// Route::get('/search/{param}','ToppageController@search');
// Route::any('/search','ToppageController@search' )->name('search');
// Route::get('/', 'ToppageController@index')->name('toppage');
// Route::get('/aboutus', 'ToppageController@aboutus')->name('aboutus');
// Route::get('/item/{param}','ItemController@show')->where('param', '[0-9]+')->name('item');
// Route::post('/item/{param}','ItemController@addtocart')->where('param', '[0-9]+')->name('item');
// Route::get('/info/{param}','InfoController@index')->where('param', '[0-9]+');
// Route::get('/viewall','ToppageController@viewall');
// //cart
// Route::delete('/cart/delete/{param}', 'ShoppingcartController@delete');
// Route::get('/cart', 'ShoppingcartController@show');
// Route::get('/mail', 'MailSendController@send');

// Route::get('/user', 'UserpageController@show')->name('userpage');
// Route::post('/user/patch', 'UserpageController@patch')->name('userpatch');

Route::middleware('verified')->group(function () {//メール認証が必要
  Route::group(['middleware' => ['auth']], function () { //ログインが必要なグループ
    Route::get('/cart/cashier', 'ShoppingcartController@confirm');
    Route::get('/cart/cashier/confirmaddress', 'ShoppingcartController@confirm');
    Route::post('/cart/cashier/confirm', 'ShoppingcartController@confirmaddress');
    //payment、ログインが必要
    Route::post('/cart/cashier/payment', 'PaymentsController@paymentpage')->name('paymentpage');
    Route::post('/cart/cashier/payment/form', 'PaymentsController@payment')->name('paymentform');
    Route::get('/cart/cashier/payment/complete', 'PaymentsController@complete')->name('complete');
    //userpage
    Route::get('/user/itemfav', 'UserpageController@itemfav')->name('useritemfav');
    Route::get('/user/passwordchange', 'UserpageController@ChangePasswordForm')->name('password.form');
    Route::post('/user/passwordchange', 'UserpageController@ChangePassword')->name('password.change');
    //itemfavs
    Route::post('/item/fav/{param}','ItemController@itemfav')->name('itemfav');
    Route::post('/item/unfav/{param}','ItemController@itemunfav')->name('itemunfav');
  });
});

Route::group(['middleware' => ['auth', 'can:isAdmin']], function () {//ログインと管理者が必要なグループ
  //テスト環境用,管理用グループ(本番ルートがonのときはoffにしないといけない)
  //userpage
  Route::get('/user/passwordchange', 'UserpageController@ChangePasswordForm')->name('password.form');
  Route::post('/user/passwordchange', 'UserpageController@ChangePassword')->name('password.change');
  Route::get('/user', 'UserpageController@show')->name('userpage');
  Route::post('/user/patch', 'UserpageController@patch')->name('userpatch');
  //toppage
  Route::get('/search/{param}','ToppageController@search');
  Route::any('/search','ToppageController@search' )->name('search');
  Route::POST('/search','ToppageController@search' )->name('search');
  Route::get('/', 'ToppageController@index')->name('toppage');
  Route::get('/item/{param}','ItemController@show')->where('param', '[0-9]+')->name('item');
  Route::post('/item/{param}','ItemController@addtocart')->where('param', '[0-9]+')->name('item');
  Route::get('/info/{param}','InfoController@index')->where('param', '[0-9]+');
  Route::get('/viewall','ToppageController@viewall');
  //cart
  Route::delete('/cart/delete/{param}', 'ShoppingcartController@delete');
  Route::get('/cart', 'ShoppingcartController@show');
  Route::get('/cart/cashier', 'ShoppingcartController@confirm');
  Route::get('/cart/cashier/confirmaddress', 'ShoppingcartController@confirm');
  Route::post('/cart/cashier/confirm', 'ShoppingcartController@confirmaddress');
  //payment、ログインが必要
  Route::post('/cart/cashier/payment', 'PaymentsController@paymentpage')->name('paymentpage');
  Route::post('/cart/cashier/payment/form', 'PaymentsController@payment')->name('paymentform');
  Route::get('/cart/cashier/payment/complete', 'PaymentsController@complete')->name('complete');

    
  //本番用、管理者区域
    Route::namespace('Admin')->group(function() {
      Route::delete('/admin/poyopoyopage/eventmanage/delete/{param}', 'AdminEventmanageController@destroy')->where('param', '[0-9]+');
      Route::get('/admin/poyopoyopage/eventmanage/edit/{param}', 'AdminEventmanageController@editpage')->where('param', '[0-9]+');
      Route::post('/admin/poyopoyopage/eventmanage/edit/{param}/patch', 'AdminEventmanageController@editpatch')->where('param', '[0-9]+')->name('editevent'); 
      Route::post('/admin/poyopoyopage/eventmanage/upload', 'AdminEventmanageController@create')->name('infoupload');
      Route::get('/admin/poyopoyopage/eventmanage', 'AdminEventmanageController@index')->name('adminevents');
      Route::get('/admin/poyopoyopage', 'TopController@index')->name('adminpage');
      Route::post('/admin/poyopoyopage', 'TopController@headimgcreate')->name('headimgupload');
      Route::post('/admin/poyopoyopage/addbuilder', 'TopController@addbuilder')->name('addbuilder');
      Route::delete('/admin/poyopoyopage/deletebuilder', 'TopController@deletebuilder')->name('deletebuilder');
      Route::post('/admin/poyopoyopage/addcategory', 'TopController@addcategory')->name('addcategory');
      Route::delete('/admin/poyopoyopage/deletecategory', 'TopController@deletecategory')->name('deletecategory');
      Route::get('/admin/poyopoyopage/itemmanage', 'AdminItemmanageController@itemmanage')->name('adminitems');
      Route::post('/admin/poyopoyopage/itemmanage/itemupload', 'AdminItemmanageController@itemupload')->name('itemupload');
      Route::get('/admin/poyopoyopage/itemmanage/edit/{param}', 'AdminItemmanageController@itemedit')->where('param', '[0-9]+');
      Route::post('/admin/poyopoyopage/itemmanage/edit/{param}', 'AdminItemmanageController@itempatch')->where('param', '[0-9]+');
      Route::delete('/admin/poyopoyopage/itemmanage/delete/{param}', 'AdminItemmanageController@destroy')->where('param', '[0-9]+');
      Route::POST('/admin/poyopoyopage/itemdatabase','AdmindatabaseController@search')->name('adminitemsearch');
      Route::get('/admin/poyopoyopage/itemdatabase', 'AdmindatabaseController@index');
      Route::POST('/admin/poyopoyopage/userdatabase','AdmindatabaseController@usersearch')->name('adminusersearch');
      Route::get('/admin/poyopoyopage/userdatabase', 'AdmindatabaseController@userindex');
      Route::get('/admin/poyopoyopage/userdatabase/edit/{param}','AdmindatabaseController@usereditpage');
      Route::post('/admin/poyopoyopage/userdatabase/edit/{param}','AdmindatabaseController@usereditpatch');
      Route::get('/admin/poyopoyopage/saleshistory','AdminsaleshistoryController@index');
      Route::POST('/admin/poyopoyopage/saleshistory','AdminsaleshistoryController@historysearch')->name('adminitemhistorysearch');
      Route::get('/admin/poyopoyopage/builderlist','TopController@builderindex');
    });
    
  });




