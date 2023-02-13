<?php

namespace App\Services;


interface INewsletter
{

    public function subscribe(string $email, $list = null);
}
