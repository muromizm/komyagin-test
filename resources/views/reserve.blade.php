<?php

use App\Models\ApiProvider;

/** @var string $message */

if (! ($provider = (new ApiProvider())->getApi(ApiProvider::API_NAME_1))) {
    ?><p>Не удалось загрузить клиент API.</p><?php

    exit();
}

$shows = $provider->getShows();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test API client</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/css/app.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <p><?=$message?></p>
        <a href="/">На главную</a>
    </body>
</html>
