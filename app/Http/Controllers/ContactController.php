<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contact = null;

    public function __construct(Contact $contact)
    {
        $this->contact= $contact;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->contact = $this->contact->orderBy('id', 'DESC')->get();
        return view('admin.contact.contactList')->with('contact_data' , $this->contact);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.contactForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->contact->getRules();
        $request->validate($rules);
        $data = $request->all();
        $this->contact->fill($data);

        $status = $this->contact->save();
        if($status){
            notify()->success('Contact added successfully.');
        }else{
            notify()->error('Sorry! There was problem in adding contact.');
        }

        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->contact = $this->contact->find($id);
        if (!$this->contact) {
            notify()->error('This contact doesnot exists');
            return redirect()->route('contact.index');
        }
        return view('admin.contact.contactView')->with('contact_data', $this->contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->contact = $this->contact->find($id);
        if (!$this->contact) {
            notify()->error('This contact doesnot exists');
            return redirect()->route('contact.index');
        }

        return view('admin.contact.contactForm')->with('contact_data', $this->contact);
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
        $this->contact = $this->contact->find($id);
        if (!$this->contact) {
            notify()->error('This contact doesnot exists');
            return redirect()->route('contact.index');
        }
        $rules = $this->contact->getRules();
        $request->validate($rules);
        $data = $request->all();
        $this->contact->fill($data);
        $status = $this->contact->save();
        if($status){
            notify()->success('Contact updated successfully');
        }else{
            notify()->error('Sorry! There was problem in adding contact');
        }
        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->contact = $this->contact->find($id);
        if (!$this->gallery) {
            notify()->error('This contact doesnot exists');
            return redirect()->route('gallery.index');
        }
        $del = $this->contact->delete();
        if ($del) {
            notify()->success('This contact deleted successfully');
        } else {
            notify()->error('There was problem in deleting contact');
        }
        return redirect()->route('contact.index');
    }
}
