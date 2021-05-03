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
        $newContact->name = $request->contact['name'];
        $newContact->email = $request->contact['email'];
        $newContact->address = $request->contact['address'];
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
            $existingContact->name = $request->contact['name'];
            $existingContact->email = $request->contact['email'];
            $existingContact->address = $request->contact['address'];
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
        $existing_contact = Contact::find($id);
        if ($existing_contact) {
            $existing_contact->delete();
            return "Contact deleted";
        }
        return "Contact not found!";
    }
}
