<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use App\Traits\Common;

class TestimonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        $contacts=Contact::get();
        return view('admin.testimonialsList',compact('testimonials','contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $testimonials = Testimonial::get();
        $contacts=Contact::get();
        return view('admin.addTestimonial',compact('testimonials','contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $testimonials = Testimonial::get();
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'position'=>'required|string|max:50',
            'content'=>'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);

        $fileName = $this->uploadFile($request->image, 'assets/admin/images');    
        $data['image'] = $fileName;

        $data['published'] = isset($request->published);
        Testimonial::create($data);
        Alert::success('Added Testimonial','Testimonial added successfully!');
        return redirect ('admin/testimonialsList');
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
        $testimonial = Testimonial::findOrFail($id);
        $contacts=Contact::get();
        return view('admin.editTestimonial',compact('testimonial','contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $testimonials = Testimonial::get();
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'position'=>'required|string|max:50',
            'content'=>'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            ], $messages);

            if($request->hasFile('image')){
                $fileName = $this->uploadFile($request->image, 'assets/admin/images');    
                $data['image'] = $fileName;
                unlink("assets/admin/images/" . $request->oldImage);
            }
            
            $data['published'] = isset($request->published);
            Testimonial::where('id', $id)->update($data);
            Alert::success('Update Testimonial Data','Data updated successfully!');
            return redirect('admin/testimonialsList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id',$id)->delete();
        Alert::success('Delete Testimonial Data','Data deleted successfully!');
        return redirect ('admin/testimonialsList');
    }

    public function messages(){
        return[
                'name.required'=>'Name is required',
                'position.required'=> 'Position is required',
                'content.required'=> 'Content is required',
                'image.required'=> 'Please be sure to select an image',
                'image.mimes'=> 'Incorrect image type',
                'image.max'=> 'Max file size is exceeded',
                ];
    }

    public function addTestimonial()
    {
        $contacts=Contact::get();
        return view('admin.addTestimonial', compact('contacts'));
    }
}
