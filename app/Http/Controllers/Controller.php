<?php

namespace App\Http\Controllers;

use App\Models\ApiProvider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function reserve(Request $request)
    {
        if (! ($provider = (new ApiProvider())->getApi(ApiProvider::API_NAME_1))) {
            return view('reserve', [
                'message' => 'Не удалось загрузить клиент API',
            ]);
        }

        $result = $provider->reserveEventPlaces(
            $request->get('eventId'),
            $request->get('name'),
            $request->get('places')
        );

        $message = $result['success']
            ? 'Бронирование прошло усепшно. Идентификатор вашей брони: ' . $result['reservation_id']
            : 'Не удалось получить броню';

        return view('reserve', [
            'message' => $message,
        ]);
    }
}
