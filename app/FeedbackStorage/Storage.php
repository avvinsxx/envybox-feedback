<?php

namespace App\FeedbackStorage;

interface Storage
{
    public function store(array $data);
}