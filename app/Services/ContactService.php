<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
{
    public function list()
    {
        $data            = [];
        $data['data']    = Contact::orderBy('id', 'DESC')->get();

        return $data;
    }
}
