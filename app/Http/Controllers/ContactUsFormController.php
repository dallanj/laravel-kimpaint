<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactUsFormController extends Controller
{
    public function create(): View
    {
        return view('contact-us');
    }

    public function store(StoreContactRequest $request): RedirectResponse
    {
        $contact = Contact::create($request->validated());

        Mail::send('mail', [
            'name' => $contact->name,
            'company' => $contact->company,
            'email' => $contact->email,
            'phone' => $contact->phone,
            'subject' => $contact->subject,
            'user_query' => $contact->message,
        ], function ($message) use ($contact) {
            $message
                ->to(config('mail.contact_recipient'))
                ->replyTo($contact->email, $contact->name)
                ->subject($contact->subject);
        });

        return back()->with(
            'success',
            'We have received your message and would like to thank you for writing to us.'
        );
    }
}
