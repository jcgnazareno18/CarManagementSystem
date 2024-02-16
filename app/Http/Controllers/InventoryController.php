<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\Inventory;
use App\Models\MyModel;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use function Laravel\Prompts\alert;

class InventoryController extends Controller
{

   

    public function storeCar(Request $request){

        if ($request->hasFile('image')) {
            // Upload image
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->storeAs('carscontainer', $imageName, 'public'); // Adjust the storage path as needed
        }
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'model_id' => 'required',
        'dealer_id' => 'required',
        'price' => 'required',
    ]);

    // Generate a VIN (Vehicle Identification Number)
    $vin = $this->generateVin(); // Assuming generateVin() is a method to generate a unique VIN
   

   
    $createdCar = Vehicle::create([
        'vin' => $vin,
        'model_id' => $request->model_id,
        'dealer_id' => $request->dealer_id,
        'price' => $request->price,
        'image' => $imageName, // Store the image file name instead of the file object
    ]);

    Inventory::create([
        "vehicle_id" => $createdCar->vehicle_id
    ]);

    return redirect()->route('cars');
    }


    

    private function generateVin() {
        // Generate a random string (assuming VIN format and length)
        return Str::random(17); // Adjust the length as needed based on VIN format
    }

    

    public function dashboard(){

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

        $purchases= Purchase::all();
        $purchaseLength = count($purchases);
    
            
        return view('pages.dashboard',compact("cars",'purchaseLength'));
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
        'vehicles.image',
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
        'vehicles.image',
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


    public function cars() {
        $models = MyModel::all();
        $dealers = User::where('role', 'dealer')->get();

        return view('pages.cars',compact('models','dealers'));
        
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

