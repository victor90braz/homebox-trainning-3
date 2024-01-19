<?php

use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController ::class, 'create'])->middleware('guest');
Route::post('login', [SessionController ::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController ::class, 'destroy'])->middleware('auth');

Route::get('/members', function () {

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us21'
    ]);

    $response = $mailchimp->lists->getListMembersInfo("76cf69a4f6");
    ddd($response);
});

Route::post('/newsletter', function () {

    request()->validate(['email' => 'required|email']);

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us21'
    ]);

    $mailchimp->lists->addListMember("76cf69a4f6", [
        'email_address' => request('email'),
        'status' => 'subscribed'
    ]);

    return redirect('/')->with('success', 'You are now signed up for our newsletter');
});
