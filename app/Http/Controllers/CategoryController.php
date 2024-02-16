<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Car;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        $contacts=Contact::get();
        return view('admin.categories',compact('categories','contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $contacts=Contact::get();
        return view('admin.addCategory',compact('categories','contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'category_name'=>'required|string|max:50|unique:categories',
            ], $messages);
        
        Category::create($data);
        Alert::success('Added Category','Category added successfully!');
        return redirect ('admin/categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $contacts=Contact::get();
        return view('admin.editCategory',compact('category','contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'category_name'=>'required|string|max:50|unique:categories,category_name,'.$id,
            ], $messages);
           
            Category::where('id', $id)->update($data);
            Alert::success('Update Category Data','Data updated successfully!');
            return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     Category::where('id',$id)->delete();
    //     Alert::success('Delete Category Data','Data deleted successfully!');
    //     return redirect ('admin/categories');
    // }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        if ($category->cars->isEmpty()) {
            $category->delete();
            Alert::success('Delete Category Data','Data deleted successfully!');
            return redirect ('admin/categories');
        } else {
            Alert::error('Error','Cannot delete categories with related car records!');
            return redirect ('admin/categories');
        }
    }

    public function messages(){
        return[
                'category_name.required'=>'Category Name is required',
                'category_name.max'=>'Category Name should not exceed 50 characters',
                'category_name.unique'=>'Category Name already exists',
                ];
    }

    public function addCategory()
    {
        $contacts=Contact::get();
        return view('admin.addCategory', compact('contacts'));
    }
}
