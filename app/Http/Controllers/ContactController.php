<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts=Contact::orderBy('created_at','desc')->get();
        return view('admin.messages',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contacts=Contact::get();
        return view('admin.showMessage',compact('contact','contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::where('id',$id)->delete();
        Alert::success('Delete Message Data','Data deleted successfully!');
        return redirect ('admin/messages');
    }

    public function allAlerts()
    {
        $contacts=Contact::orderBy('created_at','desc')->get();
        return view('admin.allAlerts',compact('contacts'));
    }

    public function markAsRead($id){        
        $contacts = Contact::get();
        $contact = Contact::find($id);
        $contact->is_read = true;
        $contact->save();
        Alert::success('Message Read','Message is marked as read!');
        return redirect ('admin/allAlerts');
    }

}
