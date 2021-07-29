<?php

namespace App\Models\Api;

use Illuminate\Support\Facades\Http;
use App\Models\ApiInterface;

class Api1 implements ApiInterface
{
    private const URL = 'https://lead1book.ru/test-task-api/';
    private const TOKEN = 'f72e02929b79c96daf9e336e0a5cdb8059e60685';

    /**
     * Возвращает список мероприятий.
     * @return array
     */
    public function getShows(): array
    {
        return Http::acceptJson()
            ->withHeaders(['Authorization' => 'token=' . self::TOKEN])
            ->get(self::URL . 'shows')
            ->json()['response'];
    }
//    public function getShowsEvents(int $showId);
//    public function getEventsPlaces(int $eventId);
//    public function reserveEventsPlaces(int $eventId, string $name, array $placesIds);
}
