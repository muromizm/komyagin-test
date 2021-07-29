<?php

namespace App\Models\Api;

use Illuminate\Support\Facades\Http;
use App\Models\ApiInterface;
use Throwable;

class Api1 implements ApiInterface
{
    private const URL = 'https://leadbook.ru/test-task-api/';
    private const TOKEN = 'f72e02929b79c96daf9e336e0a5cdb8059e60685';

    /**
     * Возвращает список мероприятий или ошибку.
     * @return array|string
     */
    public function getShows()
    {
        return $this->getResponse(self::URL . 'shows');
    }

    /**
     * Возвращает список событий мероприятия или ошибку.
     * @param int $showId
     * @return array|string
     */
    public function getShowEvents(int $showId)
    {
        return $this->getResponse(self::URL . "shows/$showId/events");
    }

    /**
     * Возвращает список мест события или ошибку.
     * @param int $eventId
     * @return array|string
     */
    public function getEventPlaces(int $eventId)
    {
        return $this->getResponse(self::URL . "events/$eventId/places");
    }

    /**
     * Бронирует места события.
     * @param int $eventId
     * @param string $name
     * @param array $places
     * @return array|string
     */
    public function reserveEventPlaces(int $eventId, string $name, array $places)
    {
        $url = self::URL . "events/$eventId/reserve";

        $post = [
            'name' => $name,
            'places' => $places,
        ];

        return $this->postResponse($url, $post);
    }

    /**
     * Производит запрос к АПИ методом GET.
     * @param string $url
     * @return array|string
     */
    private function getResponse(string $url)
    {
        try {
            $response = Http::acceptJson()
                ->withHeaders(['Authorization' => 'token=' . self::TOKEN])
                ->get($url)
                ->json();
        } catch (Throwable $e) {
            return $e->getMessage();
        }

        return $response['response'];
    }

    /**
     * Производит запрос к АПИ методом POST.
     * @param string $url
     * @param array $post
     * @return array|string
     */
    private function postResponse(string $url, array $post)
    {
        try {
            $response = Http::asForm()
                ->acceptJson()
                ->withHeaders(['Authorization' => 'token=' . self::TOKEN])
                ->post($url, $post)
                ->json();
        } catch (Throwable $e) {
            return $e->getMessage();
        }

        return $response['response'];
    }
}
