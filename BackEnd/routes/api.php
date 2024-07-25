<?php

use App\Http\Controllers\Api\DetailController;
use App\Http\Controllers\Api\InventarisController;
use App\Http\Controllers\Api\PegawaiController;
use App\Http\Controllers\Api\PeminjamanController;
use App\Http\Controllers\Api\RuangController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::apiResource('/test', TestController::class);
Route::apiResource('/detail_pinjam', DetailController::class);
Route::apiResource('/inventaris', InventarisController::class);
Route::apiResource('/peminjaman', PeminjamanController::class);
Route::apiResource('/pegawai', PegawaiController::class);
Route::apiResource('/ruangs', RuangController::class);
Route::apiResource('/user', UserController::class);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
