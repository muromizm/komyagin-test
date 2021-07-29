<?php

use App\Models\ApiProvider;

/** @var int $id */

if (! ($provider = (new ApiProvider())->getApi(ApiProvider::API_NAME_1))) {
    ?><p>Не удалось загрузить клиент API.</p><?php

    exit();
}

$events = $provider->getShowEvents($id);
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
        <h1>Мероприятие #<?=$id?> (<a href="/">все мероприятия</a>)</h1>
        <h2>Список событий мероприятия</h2>
        <?php foreach ($events as $event) { ?>
            <p><a href="/event/<?=$id?>/<?=$event['id']?>"><?=$event['date']?></a></p>
        <?php } ?>

        <script src="/js/app.js"></script>
    </body>
</html>
