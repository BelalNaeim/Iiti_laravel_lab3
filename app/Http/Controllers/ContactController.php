<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contact = Contact::join( 'users', 'users.id', '=', 'contacts.user_id' )->select( 'contacts.*', 'users.name' )->where('contacts.user_id' , '=', Auth::id())->orderBy( 'id', 'asc' )->get();
        return view( 'contact.index', [ 'contact' => $contact ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('contact.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $contact = new Contact();
        $contact->phone_number = $request->phone_number;
        $contact->user_id = Auth::id();
        //dd($request->all());
        $contact->save();
        return redirect()->route( 'contacts.index' );

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
        $data = DB :: table('contacts')->find($id);

        return view('contact.edit',['data' => $data]);
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
        //
        $contact = Contact::find($id);
        $contact->phone_number = $request->phone_number;
        $contact->user_id = Auth::id();

        $contact->save();

        return redirect()->route( 'contacts.index' );
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
        $contact = Contact::find($id)->delete();
        return redirect()->route( 'contacts.index' );
    }
}
