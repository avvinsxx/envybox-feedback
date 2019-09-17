<?php

namespace App\FeedbackStorage;


class StorageFactory
{
    const storageTypes = [
        'file',
        'db'
    ];

    public static function createStorage(string $type) : Storage
    {
        switch ($type) {
            case self::storageTypes[0]:
                return new FileStorage();
            case self::storageTypes[1]:
                return new DbStorage();
            default:
                throw new \OutOfBoundsException("Storage type '{$type}' does not exist");
        }
    }
}