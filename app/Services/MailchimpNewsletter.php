<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter {

    /**
     * Summary of __construct
     * @param \MailchimpMarketing\ApiClient $client
     */
    public function __construct(protected ApiClient $client) {

        //

    }


    /**
     * Summary of subscribe
     * @param mixed $email
     * @param mixed $list
     * @return mixed
     */
    public function subscribe(string $email, string $list = null) {

        // nullsafe operator: if this is null then make it this
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);

    }
}
