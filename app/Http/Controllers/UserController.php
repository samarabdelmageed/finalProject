<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        $contacts=Contact::get();
        return view('admin.users',compact('users','contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        $contacts=Contact::get();
        return view('admin.addUser',compact('users','contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'fullName'=>'required|string|max:50',
            'name'=>'required|string|max:50',
            'email'=>'required|email|unique:App\Models\User,email',
            'password' => 'required|string|min:8',
            ], $messages);
        
        $data['active'] = isset($request->active);
        Hash::make($data['password']);
        $user = User::create($data);
        $user->markEmailAsVerified();
        Alert::success('Added User','User added successfully!');
        return redirect ('admin/users');
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
        $user = User::findOrFail($id);
        $contacts=Contact::get();
        return view('admin.editUser',compact('user','contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'fullName'=>'required|string|max:50',
            'name'=>'required|string|max:50',
            'email'=>'required|email|unique:users,email,'.$id,
            'password' => 'required|string|min:8',
            ], $messages);
           
            $data['active'] = isset($request->active);
            $data['password'] = Hash::make($data['password']);
            User::where('id', $id)->update($data);
            Alert::success('Update User Data','Data updated successfully!');
            return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function messages(){
        return[
                'fullName.required'=>'Full Name is required',
                'name.required'=> 'User Name is required',
                'email.required'=> 'Email is required',
                'email.email'=> 'Email is not valid',                
                'email.unique'=> 'This Email is already taken',
                'password.required'=> 'Password is required',
                'password.min'=> 'Password should be at least 8 characters long',
                ];
    }

    public function addUser()
    {        
        $contacts=Contact::get();
        return view('admin.addUser', compact('contacts'));
    }
}
