<?php

namespace App\Models;

class ApiProvider
{
    // Имена АПИ
    public const API_NAME_1 = 'Api1';
    public const API_NAME_2 = 'Api2';

    // Классы АПИ
    private const API_CLASS = [
        self::API_NAME_1 => 'App\\Models\\Api\\Api1',
        self::API_NAME_2 => 'App\\Models\\Api\\Api2',
    ];

    /**
     * Возвращает АПИ
     * @param string $apiName
     * @return false|mixed
     */
    public function getApi(string $apiName)
    {
        if (! in_array($apiName, array_keys(self::API_CLASS))) {
            return false;
        }

        $api = self::API_CLASS['Api1'];

        return new $api;
    }
}
