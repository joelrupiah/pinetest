<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResetAdminPasswordController;
use App\Http\Controllers\AboutUsController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth:api')->prefix('admin')->group(function () {
    Route::get('/user', function(Request $request){
        return $request->user();
    });

    Route::get('/', function(){
        return view('admin.admin');
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);

    Route::get('all-admins', [AdminController::class, 'getAllAdmins']);
    Route::post('create-admin', [AdminController::class, 'store']);
    Route::post('edit-admin/{id}', [AdminController::class, 'update']);
    Route::delete('delete-admin/{id}', [AdminController::class, 'destroy']);

    Route::post('/edit-permission/{id}', [PermissionController::class, 'update']);

    Route::post('create-about', [AboutUsController::class, 'store']);

});

Route::prefix('admin')->group(function(){
    Route::post('reset-admin-password', [ResetAdminPasswordController::class, 'resetAdminPassword']);
});

Route::get('/', function(){
    return view('user.user');
});

Route::get('/admin', function(){
    return view('admin.admin');
});

Route::get('/{any}', function(){
    return view('user.user');
});

Route::get('/admin/{any}', function(){
    return view('admin.admin');
});

Route::get('/{any}/{path}', function(){
    return view('user.user');
});

Route::get('/admin/{any}/{path}', function(){
    return view('admin.admin');
});