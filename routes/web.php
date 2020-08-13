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
Route::group(['prefix'=>'account'],function(){
    Route::get('','Account\AdminController@index')->name('admin.account.index');
    Route::post('postLogin','Account\AdminController@postLogin')->name('post_login');
    Route::get('getLogoutAdmin','Account\AdminController@getLogoutAdmin')->name('admin.account.getLogoutAdmin');
});
//Admin
Route::group(['prefix'=>'admin','middleware'=>'checkLogin'],function(){
    Route::group(['prefix'=>'category'], function(){
        Route::get('','Admin\CategoryController@index')->name('admin.category.index');
        Route::get('create','Admin\CategoryController@create')->name('admin.category.create');
        Route::post('store','Admin\CategoryController@store')->name('admin.category.store');
        Route::get('hot/{id}','Admin\CategoryController@hot')->name('admin.category.hot');
        Route::get('edit/{id}','Admin\CategoryController@edit')->name('admin.category.edit');
        Route::post('update/{id}','Admin\CategoryController@update')->name('admin.category.update');
        Route::get('delete/{id}','Admin\CategoryController@destroy')->name('admin.category.delete');
    });
    //admin
    Route::group(['prefix'=>'admin'],function(){
        //list user
        Route::get('','RolePermission\AdminController@getIndex')->name('user.list')->middleware('checkAcl:user-list');
        //create user
        Route::get('create','RolePermission\AdminController@create')->name('user.add')->middleware('checkAcl:user-add');
        Route::post('create','RolePermission\AdminController@store')->name('user.postadd')->middleware('checkAcl:user-add');
        Route::get('edit/{id}','RolePermission\AdminController@edit')->name('user.edit')->middleware('checkAcl:user-edit');
        Route::post('postedit/{id}','RolePermission\AdminController@postedit')->name('user.postedit')->middleware('checkAcl:user-edit');
        Route::get('delete/{id}','RolePermission\AdminController@delete')->name('user.delete')->middleware('checkAcl:user-delete');
    });
    //Role
    Route::group(['prefix'=>'roles'],function(){
        //list user
        Route::get('','RolePermission\RoleController@getIndex')->name('role.list')->middleware('checkAcl:role-list');
        //create user
        Route::get('create','RolePermission\RoleController@create')->name('role.add')->middleware('checkAcl:role-add');
        Route::post('create','RolePermission\RoleController@store')->name('role.postadd')->middleware('checkAcl:role-add');
        Route::get('edit/{id}','RolePermission\RoleController@edit')->name('role.edit')->middleware('checkAcl:role-edit');
        Route::post('postedit/{id}','RolePermission\RoleController@postedit')->name('role.postedit')->middleware('checkAcl:role-edit');
        Route::get('delete/{id}','RolePermission\RoleController@delete')->name('role.delete')->middleware('checkAcl:role-delete');
    });
    //Permission
    Route::group(['prefix'=>'permission','middleware'=>'checkAcl:permission'],function(){
        //list user
        Route::get('','RolePermission\PermissionController@getIndex')->name('permission.list');
        //create user
        Route::get('create','RolePermission\PermissionController@create')->name('permission.add');
        Route::post('create','RolePermission\PermissionController@store')->name('permission.postadd');
        Route::get('edit/{id}','RolePermission\PermissionController@edit')->name('permission.edit');
        Route::post('postedit/{id}','RolePermission\PermissionController@postedit')->name('permission.postedit');
        Route::get('delete/{id}','RolePermission\PermissionController@delete')->name('permission.delete');
    });
});

