<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Car;
use App\Models\Category;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\Common;

class CarController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        $contacts=Contact::get();
        return view('admin.cars',compact('cars','contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $contacts=Contact::get();
        return view('admin.addCar',compact('categories','contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $categories = Category::get();
        $data = $request->validate([
            'title'=>'required|string|max:100',
            'price'=>'required|numeric',
            'content'=>'required|string',
            'luggage'=>'required|integer',
            'doors'=>'required|integer',
            'passengers'=>'required|integer',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id'=>'required',
        ], $messages);

        $fileName = $this->uploadFile($request->image, 'assets/admin/images');    
        $data['image'] = $fileName;

        $data['active'] = isset($request->active);
        Car::create($data);
        Alert::success('Added Car','Car added successfully!');
        return redirect ('admin/cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        $categories = Category::withCount('cars')->get();
        return view('singlePost',compact('car','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        $categories = Category::get();
        $contacts=Contact::get();
        return view('admin.editCar',compact('car','categories','contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $categories = Category::get();
        $data = $request->validate([
            'title'=>'required|string|max:100',
            'price'=>'required|numeric',
            'content'=>'required|string',
            'luggage'=>'required|integer',
            'doors'=>'required|integer',
            'passengers'=>'required|integer',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'category_id'=>'required'
            ], $messages);

            if($request->hasFile('image')){
                $fileName = $this->uploadFile($request->image, 'assets/admin/images');    
                $data['image'] = $fileName;
                unlink("assets/admin/images/" . $request->oldImage);
            }
            
            $data['active'] = isset($request->active);
            Car::where('id', $id)->update($data);
            Alert::success('Update Car Data','Data updated successfully!');
            return redirect('admin/cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id',$id)->delete();
        Alert::success('Delete Car Data','Data deleted successfully!');
        return redirect ('admin/cars');
    }

    public function messages(){
        return[
                'title.required'=>'Title is required',
                'price.required'=> 'Price is required',
                'price.numeric'=> 'Price should be a number',
                'content.required'=> 'Content is required',
                'luggage.required'=> 'Luggage is required',
                'luggage.integer'=> 'Luggage should be an integer',
                'doors.required'=> 'Doors is required',
                'doors.integer'=> 'Doors should be an integer',
                'passengers.required'=> 'Passengers is required',
                'passengers.integer'=> 'Passengers should be an integer',
                'image.required'=> 'Please be sure to select an image',
                'image.mimes'=> 'Incorrect image type',
                'image.max'=> 'Max file size is exceeded',
                'category_id.required'=> 'Category is required',
                ];
    }

    public function addCar()
    {
        $categories = Category::get();
        $contacts=Contact::get();
        return view('admin.addCar', compact('categories','contacts'));
    }
}
