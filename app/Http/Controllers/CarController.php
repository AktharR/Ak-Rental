<?php

namespace App\Http\Controllers;

use App\Models\cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index()
    {
        $user=Auth::user()->id;
        $user=Auth::user()->name;
        return view ('/Admin/adminDashboard',compact('user'));
    }

    public function create()
    {
        return view ('/Admin/addCar');
    }

    public function store(Request $request )
    {
        
        
        $validatedData = $request->validate([
            'car_image.*' => 'required|mimes:jpeg,jpg,png,gif|max:10000', // Each image must be valid
            'car_name' => 'required',
            'car_number_plate' => 'required',
            'rent_price' => 'required',
            'fuel_type' => 'required',
            'description' => 'required',
        ]);
    
        $imageNames = [];
    
        // Check if the request contains files
        if ($request->hasFile('car_image')) {
            $images = $request->file('car_image');
    
            // Loop through each uploaded image and save it
            foreach ($images as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $imageNames[] = $imageName; // Save each image name
            }
        }
    
        // Create a new car record
        $car = new cars;
    
        // Save images as a JSON array
        $car->images = json_encode($imageNames);
        $car->car_name = $validatedData['car_name'];
        $car->car_number_plate = $validatedData['car_number_plate'];
        $car->rent_price = $validatedData['rent_price'];
        $car->fuel_type = $validatedData['fuel_type'];
        $car->car_description = $validatedData['description'];
        $car->user_id = Auth::id();
    
        // Save the car record
        $car->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Car created successfully!');

    }



    public function show(Request $request)
    {
       
        $cars = cars::all();
        return view('admin.viewCar',['cars'=>$cars]);
    }


    public function edit(Request $request,$id)
    {
       $cars= cars::findOrFail($id);
        return view('admin.editCar',['cars'=>$cars]);
    }

    public function update(Request $request,$id)
    {
         // Find the car by ID
         $car = cars::find($id);

         if (!$car) {
             return redirect()->back()->with('error', 'Car not found.');
         }
 
         // Validate the request data
         $validatedData = $request->validate([
 
             'car_name' => 'required',
             'car_number_plate' => 'required',
             'rent_price' => 'required|numeric',
             'fuel_type' => 'required',
             'description' => 'required',
         ]);
 
         // Handle the image upload if a new image is provided
         if ($request->hasFile('car_image')) {
             $image = $request->file('car_image');
             $imageName = time() . '.' . $image->getClientOriginalExtension();
             $image->move(public_path('images'), $imageName);
 
             // Set the new image name to the car model
             $car->image = $imageName;
         }
 
         // Update the rest of the car fields
         $car->car_name = $validatedData['car_name'];
         $car->car_number_plate = $validatedData['car_number_plate'];
         $car->rent_price = $validatedData['rent_price'];
         $car->fuel_type = $validatedData['fuel_type'];
         $car->car_description = $validatedData['description'];
 
         // Save the updated car record to the database
         $car->save();
 
         return redirect(route('admin.viewCar'))->with('success', 'Car updated successfully!');
    }

    public function destroy($id)
    {

        
        $car = cars::find($id);

        $car->delete();

        return redirect()->route('admin.viewCar')->with('success', 'Product deleted successfully.');
    }

    
    


}