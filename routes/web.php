<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryController;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
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
Route::get('/thankyoupage',function(){
    return view('pages.thankyoupage');
})->name('thankyoupage');
Route::get('/purchasedCars',[InventoryController::class,"purchasedCars"])->name("purchasedCars");
Route::get('/cardetials/{id}',[InventoryController::class,"cardetial"])->name("cardetial");

Route::get('/customerform/{id}',function($id){

    $carId = $id;
    return view('pages.customerform',compact('carId'));

})->name("customerform");




Route::post('/customerpurchase', function(Request $request){

    
    Validator::make($request->all(), [
        'name' =>  'required',
        'address' => 'required',
        'gender' => 'required',
        'phone' => 'required',
        'annual_income' => 'required',
        'car_id' => 'required',
    ])->validate();



       $customer = Customer::create([
            'name' =>  $request->name,
            'address' => $request->address,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'annual_income' => $request->annual_income,
        ]);

        Purchase::create([
            'customer_id' => $customer->customer_id ,
            'inventory_id' => $request->car_id,
        ]);


        return redirect()->route('thankyoupage');

})->name('customerpurchase');












Route::middleware('guest')->group(function () {
    

            
                Route::get('/', function () {
                    $cars = DB::table('inventories')
                    ->join('vehicles', 'inventories.vehicle_id', '=', 'vehicles.vehicle_id')
                    ->join('users', 'vehicles.dealer_id', '=', 'users.id')
                    ->join('models', 'vehicles.model_id', '=', 'models.model_id')
                    ->join('options', 'models.option_id', '=', 'options.option_id')
                    ->join('brands', 'models.brand_id', '=', 'brands.brand_id')
                    ->select(
                        "inventories.inventory_id",
                        'models.name as model_name',
                        'models.body_style',
                        'vehicles.price',
                        'vehicles.image',
                        'options.color',
                        'options.transmission',
                        'options.engine',
                        DB::raw('brands.name as brand_name'),
                    )
                    ->get();

                    $topCars = DB::table('purchases')
                    ->join('inventories', 'purchases.inventory_id', '=', 'inventories.inventory_id')
                    ->join('vehicles', 'inventories.vehicle_id', '=', 'vehicles.vehicle_id')
                    ->join('users', 'vehicles.dealer_id', '=', 'users.id')
                    ->join('models', 'vehicles.model_id', '=', 'models.model_id')
                    ->join('options', 'models.option_id', '=', 'options.option_id')
                    ->join('brands', 'models.brand_id', '=', 'brands.brand_id')
                    ->select(
                        "inventories.inventory_id",
                        'models.name as model_name',
                        'models.body_style',
                        'vehicles.price',
                        'vehicles.image',
                        'options.color',
                        'options.transmission',
                        'options.engine',
                        DB::raw('brands.name as brand_name'),
                        DB::raw('COUNT(purchases.purchase_id) as purchase_count') // Counting the number of purchases
                    )
                    ->groupBy('inventories.inventory_id') // Grouping by inventory_id
                    ->orderByDesc('purchase_count') // Ordering by purchase count in descending order
                    ->limit(3) // Limiting the result to the top 5
                    ->get();
                


                    return view('welcome',compact('cars','topCars'));
                })->name("home");

   

            Route::get('/loginpage', function () {
                return view('pages.loginpage');
            })->name("loginpage");
            
            Route::controller(AuthController::class)->group(function() {
            
                Route::post('login', 'loginAction')->name('login.action');

            
            });
            

});







Route::middleware('auth')->group(function() {


    Route::get('/dealers',function(){
        return view("pages.dealers");
    })->name("dealers");
    Route::controller(AuthController::class)->group(function() {
        Route::post('register', 'registerSave')->name('register.save');
    });
    

   
Route::get('/cars',[InventoryController::class,"cars"])->name("cars");
Route::get('/dashboard',[InventoryController::class,"dashboard"])->name("dashboard");

Route::post('/dashboardPurchase',[InventoryController::class,"purchase"])->name("car.purchase");
Route::post('/storeCar',[InventoryController::class,"storeCar"])->name("storeCar");




});




Route::get('logout', [AuthController::class, 'logout'])->name('logout');
