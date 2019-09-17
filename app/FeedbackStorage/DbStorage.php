<?php

namespace App\FeedbackStorage;

use App\Feedback;

class DbStorage implements Storage
{

    public function store(array $data)
    {
        Feedback::create($data);
    }
}