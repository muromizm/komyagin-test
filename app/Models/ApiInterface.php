<?php

namespace App\Models;

interface ApiInterface
{
    public function getShows();
    public function getShowEvents(int $showId);
    public function getEventPlaces(int $eventId);
    public function reserveEventPlaces(int $eventId, string $name, array $places);
}
