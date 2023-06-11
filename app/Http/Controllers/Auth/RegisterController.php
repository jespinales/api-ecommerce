<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $validated = $request->validated();
        $client = Client::create($validated);
        return jsend_success([
            'client' => $client,
            'access_token' => $client->createToken('API token')->plainTextToken
        ]);
    }
}
