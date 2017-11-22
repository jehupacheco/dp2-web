<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Token;
use App\Models\Client;

class AuthenticateController extends Controller
{
    public function authenticate(Request $request)
    {
        auth()->shouldUse('api');
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $payload = JWTAuth::decode(new Token($token));
        $id = $payload['sub'];

        $client = Client::find($id);

        if ($client->blocked) {
            return response()->json(['error' => 'This user has been blocked'], 401);
        }
        // all good so return the token
        $organization = $client->organization()->get()->first();
        $sensors = $organization->sensors()->get();
        return response()->json(compact('token', 'id', 'organization', 'sensors'));
    }
}
