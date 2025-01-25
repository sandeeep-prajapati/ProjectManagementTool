<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiManagementController;
use App\Models\ApiCkediterRecord;
use App\Models\ApiRecord;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ApiManagementController::class, 'indexPage'])->name('index');
Route::get('/addNewCard',[ApiManagementController::class, 'addNewCard'])->name('addNewCard');
Route::post('saveNoticeBoard', [ApiManagementController::class, 'saveNoticeBoard']);
Route::get('/delete/{id?}', [ApiManagementController::class, 'deleteCard']);
