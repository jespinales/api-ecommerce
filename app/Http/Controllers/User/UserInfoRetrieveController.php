<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class UserInfoRetrieveController extends Controller
{
    public function __invoke(Client $client)
    {
        $response = [];
        if ($client->id === request()->user()->id) {
            $response = jsend_success([
                'client' => $client
            ]);
        } else {
            $response = jsend_fail([], 403);
        }
        return $response;
    }
}
