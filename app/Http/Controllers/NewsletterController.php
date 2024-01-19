<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;

class NewsletterController extends Controller
{
    public function create(Newsletter $newsletter)
    {
        request()->validate([
            'email' => ['required', 'email']
        ]);

        try {

            $newsletter->subscribe(request('email'));

            return redirect('/')->with('success', 'You are subscribed now.');

        }catch (\Exception $e) {

            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter.'
            ]);
        }
    }
}
