<?php

namespace App\Services;

class MemberServices
{
    public function getListMembersInfo()
    {
        return $this->client()->lists->getListMembersInfo(config('services.mailchimp.keyList'));
    }

    public function client()
    {
        return (new \MailchimpMarketing\ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.prefix'),
        ]);
    }
}
