<?php

use App\Http\Controllers\TikiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| All Web Routes For Tiki Ticketing System
|--------------------------------------------------------------------------
*/

Route::get('/',[TikiController::class,'homepage'])->name('home');
Route::get('/bustrip',[TikiController::class,'bustrippage'])->name('bustrip');
Route::get('/locations',[TikiController::class,'addtriplocationpage'])->name('locationpage');
Route::post('/addlocation',[TikiController::class,'addtriplocation'])->name('addlocation');
Route::get('/alllocation',[TikiController::class,'alllocation'])->name('alllocation');
Route::get('/removelocation',[TikiController::class,'removelocationpage'])->name('removelocation');
Route::post('/confirmremovelocation',[TikiController::class,'confirmdeletelocation'])->name('confirmremovelocation');
Route::get('/addtrip',[TikiController::class,'addtrippage'])->name('addtrip');
Route::post('/confirmtrip',[TikiController::class,'confirmtrip'])->name('confirmtrip');
Route::get('/findtrip',[TikiController::class,'findtrippage'])->name('findtrip');
Route::post('/searchtrip',[TikiController::class,'searchtrip'])->name('searchtrip');
Route::get('/seats',[TikiController::class,'bookseatspage'])->name('bookseats');
Route::post('/buyseats',[TikiController::class,'buyseats'])->name('buyseats');