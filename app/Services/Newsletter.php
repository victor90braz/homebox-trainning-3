<?php

namespace App\Services;
class Newsletter
{
    public function subscribe($email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribes');

        return $this->client()->lists->addListMember( $list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

    public function client()
    {
        return (new \MailchimpMarketing\ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us21'
        ]);
    }
}
