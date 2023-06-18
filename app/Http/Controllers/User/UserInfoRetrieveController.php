<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class UserInfoRetrieveController extends Controller
{
    public function __invoke()
    {
        return jsend_success([
            'client' => request()->user()
        ]);
    }
}
