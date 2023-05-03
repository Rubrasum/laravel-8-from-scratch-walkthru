<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email) {

        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.prefix')
        ]);

        return $response = $mailchimp->lists->addListMember('21bdd73e63', [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
}
