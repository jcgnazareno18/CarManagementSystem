<?php

use App\Http\Controllers\InventoryController;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|




/*
get 
post
patch
put
delete
*/


Route::get('/',[InventoryController::class,"index"])->name("home");
Route::get('/dealersView',[InventoryController::class,"delearsView"])->name("dealersView");
Route::get('/purchasedCars',[InventoryController::class,"purchasedCars"])->name("purchasedCars");
Route::get('/cardetials/{id}',[InventoryController::class,"cardetial"])->name("cardetial");
Route::post('/dashboardPurchase',[InventoryController::class,"purchase"])->name("car.purchase");





