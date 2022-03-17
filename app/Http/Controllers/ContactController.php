<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Interfaces\ContactRepositoryInterface;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    protected $contactR ;
    public function __construct(ContactRepositoryInterface $contact)
    {
        $this->contactR = $contact;
        $this->middleware('auth');
    }

    public function index()
    {
        //$contacts = Contact::orderby('id','asc')->paginate(); before Repo
        return view('contact.index',['contacts' => $this->contactR->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new contact;
        $fields = $request->all();
        $this->contactR->create($fields);

        // $contact = contact::find($id);
        // $contact->f_name = $request->f_name;
        // $contact->l_name = $request->l_name;
        // $contact->dob = $request->dob;
        // $contact->phone = $request->phone;
        // $contact->email = $request->email;
        // $contact->address = $request->address;
        // $contact->hobby = $request->hobby;
        // $contact->gender = $request->gender;
        // $contact->country = $request->country;
        // $contact->save();
        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contact.show', ['contact' => $this->contactR->find($contact->id)]);
            
        // return view('contact.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit', ['contact' => $this->contactR->find($contact->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        // before repo

        $request->validate([
            'f_name' => 'required',
            'phone' => 'required',
            // 'age' => 'required',
            'email' => 'required',
        ]);
       
        // $contact = new contact;
        // $contact = contact::find($contact->id);
        // $contact->f_name = $request->f_name;
        // $contact->l_name = $request->l_name;
        // $contact->dob = $request->dob;
        // $contact->phone = $request->phone;
        // $contact->email = $request->email;
        // $contact->address = $request->address;
        // $contact->hobby = $request->hobby;
        // $contact->gender = $request->gender;
        // $contact->country = $request->country;
        // $contact->save();

        $this->contactR->update($contact->id,$request);
        return redirect()->route('contact.index')->with('Success','Details has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $this->contactR->delete($contact->id);
        return redirect()->route('contact.index')->with('Success','Details has been deleted successfully');
    
    }
}