<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Purchase;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;

class InventoryController extends Controller
{

    

    public function index(){

        $cars = DB::table('inventories')
        ->join('vehicles', 'inventories.vehicle_id', '=', 'vehicles.vehicle_id')
        ->join('dealers', 'vehicles.dealer_id', '=', 'dealers.dealer_id')
        ->join('models', 'vehicles.model_id', '=', 'models.model_id')
        ->join('options', 'models.option_id', '=', 'options.option_id')
        ->join('brands', 'models.brand_id', '=', 'brands.brand_id')
        ->select(
            "inventories.inventory_id",
            'models.name as model_name',
            'models.body_style',
            'vehicles.price',
            'options.color',
            'options.transmission',
            'options.engine',
             DB::raw('brands.name as brand_name'),
             DB::raw('dealers.name as dealer_name'),
        )
        ->get();

        $purchases= Purchase::all();
        $purchaseLength = count($purchases);
    
            

        return view('welcome',compact("cars",'purchaseLength'));
    }





    public function cardetial($id){

        $car = DB::table('inventories')
    ->join('vehicles', 'inventories.vehicle_id', '=', 'vehicles.vehicle_id')
    ->join('models', 'vehicles.model_id', '=', 'models.model_id')
    ->join('options', 'models.option_id', '=', 'options.option_id')
    ->join('brands', 'models.brand_id', '=', 'brands.brand_id')
    ->select(
        "inventories.inventory_id",
        'models.name as model_name',
        'models.body_style',
        'vehicles.price',
        'vehicles.vin',
        'options.color',
        'options.transmission',
        'options.engine',
        'brands.brand_id',
        DB::raw('brands.name as brand_name')
    )
    ->where('inventories.inventory_id', $id)
    ->first(); // Use first() instead of get() if you expect only one result


    $cars_available = DB::table('inventories')
    ->join('vehicles', 'inventories.vehicle_id', '=', 'vehicles.vehicle_id')
    ->join('models', 'vehicles.model_id', '=', 'models.model_id')
    ->join('brands', 'models.brand_id', '=', 'brands.brand_id')
    ->join('options', 'models.option_id', '=', 'options.option_id')
    ->select(
        "inventories.inventory_id",
        'models.name as model_name',
        'models.body_style',
        'vehicles.price',
        'vehicles.vin',
        'options.color',
        'options.transmission',
        'options.engine',
        'brands.brand_id',
        DB::raw('brands.name as brand_name')
    )
    ->where('brands.brand_id', '=', $car->brand_id)
    ->where('inventories.inventory_id', '!=', $id)
    ->get(); // Use first() instead of get() if you expect only one result

    
    
    $purchases= Purchase::all();
    $purchaseLength = count($purchases);


    
        return view("pages.cardetails",compact('car','cars_available','purchaseLength'));
    
    }


    public function delearsView() {

        $dealers_view = DB::table('purchases')
        ->join('inventories', 'purchases.inventory_id', '=', 'inventories.inventory_id')
        ->join('vehicles', 'inventories.vehicle_id', '=', 'vehicles.vehicle_id')
        ->join('dealers', 'vehicles.dealer_id', '=', 'dealers.dealer_id')
        ->groupBy('dealers.name')
        ->orderByDesc('purchase_count')
        ->limit(3)
        ->select(
            'dealers.name',
            DB::raw('COUNT(*) as purchase_count'),
            DB::raw('SUM(vehicles.price) as total_amount')
        )
        ->get();
    
    

        $purchases= Purchase::all();
        $purchaseLength = count($purchases);
    
            

        return view('pages.dealersView',compact("dealers_view",'purchaseLength'));
        
    }



    public function purchase(Request $request){

        $data = [
            "customer_id" => $request->customer_id,
            "inventory_id" => $request->inventory_id 
        ];

        Purchase::create($data);


    
        return redirect()->route("home");

    }



    public function purchasedCars() {

        $carPurchased = DB::table('purchases')
        ->join('inventories', 'purchases.inventory_id', '=', 'inventories.inventory_id')
        ->join('vehicles', 'inventories.vehicle_id', '=', 'vehicles.vehicle_id')
        ->join('models', 'vehicles.model_id', '=', 'models.model_id')
        ->join('dealers', 'vehicles.dealer_id', '=', 'dealers.dealer_id')
        ->select(
            'dealers.name',
            'purchases.created_at',
            'vehicles.vin',
            DB::raw('mod els.name as model_name')
        )
        ->get();

        

        $purchases= Purchase::all();
        $purchaseLength = count($purchases);

        return view("pages.purchasedCars",compact('carPurchased','purchaseLength'));
    }

    





}

