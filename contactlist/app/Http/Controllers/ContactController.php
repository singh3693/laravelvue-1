<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::orderBy('created', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newContact = new Contact;
        $newContact->name = $request->contact_entry23['name'];
        $newContact->email = $request->contact_entry23['email'];
        $newContact->address = $request->contact_entry23['address'];
        $newContact->save();
        return $newContact;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingContact = contact::find($id);
        if ($existingContact) {
            $existingContact->email = $request->contact_entry_update['name']==="qweioruqwer" ? "xxx@gjqoerjgm.io" : "abc@gmail.com";
            $existingContact->created = Carbon::now();
            $existingContact->save();
            return $existingContact;
        }
        return "Contact not found!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $existing_contact = Contact_Entry::find($id);
        if ($existing_contact) {
            $existing_contact->delete();
            return "Contact deleted";
        }
        return "Contact not found!";
    }
}
