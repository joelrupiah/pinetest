<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResetAdminPasswordController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AboutHistoryController;

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
    Route::get('get-all-admin-about-data', [AboutUsController::class, 'index']);
    Route::get('get-about-data/{id}', [AboutUsController::class, 'show']);
    Route::post('update-about-us/{id}', [AboutUsController::class, 'update']);

    Route::post('create-about-history', [AboutHistoryController::class, 'store']);
    Route::get('get-admin-about-history', [AboutHistoryController::class, 'index']);
    Route::get('get-about-history/{id}', [AboutHistoryController::class, 'show']);
    Route::post('update-about-history/{id}', [AboutHistoryController::class, 'update']);

});

Route::get('get-user-about', [AboutUsController::class, 'getUserAbout']);
Route::get('get-about-history', [AboutHistoryController::class, 'getAboutHistory']);

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