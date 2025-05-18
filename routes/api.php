<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Di sini didefinisikan semua endpoint API untuk register, login,
| mengambil data user, dan logout. Endpoint yang memerlukan token
| dilindungi oleh middleware auth:sanctum.
|
*/

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// Protected routes (harus menyertakan header Authorization: Bearer {token})
Route::middleware('auth:sanctum')->group(function () {
    // Mengembalikan data user yang sedang login
    Route::get('/user',   [AuthController::class, 'user']);

    // Logout: mencabut token saat ini
    Route::post('/logout', [AuthController::class, 'logout']);
});
