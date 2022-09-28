<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:List Contact Us', ['only' => ['index']]);
        $this->middleware('permission:Show Contact Us', ['only' => ['show']]);
        $this->middleware('permission:Delete Contact Us', ['only' => ['destroy']]);
    }

    public function index()
    {
        $request = request();
        $filters = $request->query();

        $fields = ['email','full_name','mobile_number'];
        $searchQuery = trim($request->query('search'));

        $contacts = Contact::where(function($query) use($searchQuery, $fields) {
            foreach ($fields as $field)
                $query->orWhere($field, 'like',  '%' . $searchQuery .'%');
            })
            ->orderBy('id', 'desc')
            ->paginate(30);

        return view('admin.contact_us.index', compact('contacts'));
    }


    public function show(Contact $contact)
    {
        return view('admin.contact_us.show', compact('contact') );
    }


    public function destroy(Contact $contact)
    {
        $contact -> delete();

        toastr()->success(trans('messages.DeleteSuccessfully'));

        return redirect()->route('admin.contacts.index');
    }
}