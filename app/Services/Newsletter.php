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

        return $mailchimp->lists->addListMember(config('services.mailchimp.lists.subscribes'), [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
}
