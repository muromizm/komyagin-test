<?php

use App\Models\ApiProvider;

/** @var int $showId */
/** @var int $eventId */

if (! ($provider = (new ApiProvider())->getApi(ApiProvider::API_NAME_1))) {
    ?><p>Не удалось загрузить клиент API.</p><?php

    exit();
}

$places = $provider->getEventPlaces($eventId);

$scale = 2;
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
            .places-wrapper {
                position: relative;
            }
            .place {
                position: absolute;
                color: white;
            }
            .available {
                background-color: green;
            }
            .unavailable {
                background-color: red;
            }
            .available:hover {
                cursor: pointer;
                border: 1px solid green;
                background-color: white !important;
                color: green;
            }
            .form {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body class="antialiased">
        <h1>Мероприятие #<?=$showId?> (<a href="/">все мероприятия</a>)</h1>
        <h2>Событие #<?=$eventId?> (<a href="/show/<?=$showId?>">все события</a>)</h2>
        <h3>Места</h3>
        <form action="/reserve" method="post">
            @csrf
            <div class="form">
                <input type="text" name="name" placeholder="Ваше имя" required>
                <input type="hidden" name="eventId" value="<?=$eventId?>">
                <input type="submit" value="Забронировать выбранные места">
            </div>
            <div class="places-wrapper">
                <?php
                foreach ($places as $place) {
                    $availability = $place['is_available'] ? 'available' : 'unavailable';
                ?>
                    <div class="place <?=$availability?>" style="left: <?=$place['x'] * $scale?>px; top: <?=$place['y'] * $scale?>px; width: <?=$place['width'] * $scale?>px; height: <?=$place['height'] * $scale?>px;">
                        <?=$place['id']?><br>
                        <input type="checkbox" name="places[]" value="<?=$place['id']?>">
                    </div>
                <?php } ?>
            </div>
        </form>
        <script src="/js/app.js"></script>
    </body>
</html>
