<?php

namespace App\FeedbackStorage;

use Illuminate\Support\Facades\Storage as LaravelFileStorage;

class FileStorage implements Storage
{
    const STORAGE_FILE = "feedback.csv";

    public function store(array $data)
    {
        if (!LaravelFileStorage::exists(self::STORAGE_FILE)) {
            LaravelFileStorage::put(self::STORAGE_FILE, 'Имя,Телефон,Сообщение');
        }

        LaravelFileStorage::append(self::STORAGE_FILE, implode(',', $data));
    }
}