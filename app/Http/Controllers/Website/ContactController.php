<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactUsNotification;

class ContactController extends Controller
{
    public function create()
    {
        return view('website.contact');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required','string', 'min:5' ,'max:255'],
            'email' => ['nullable','string' , 'email'],
            'mobile_number' => ['required','string' , 'min:9' , 'max:14'],
            'message' => ['required' , 'string' , 'min:10'],
        ]);

        $contact = Contact::create($data);

        $admins = Admin::all();

        Notification::send($admins, new ContactUsNotification($contact));

        toastr()->success(trans('messages.SentSuccessfully') , ' ');

        return redirect()->route('website.index');

    }
}
