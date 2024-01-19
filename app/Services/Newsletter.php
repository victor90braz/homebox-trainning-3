<?php

namespace App\Services;
class Newsletter
{
    public function subscribe($email)
    {
        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us21'
        ]);

        return $mailchimp->lists->addListMember("76cf69a4f6", [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
}
