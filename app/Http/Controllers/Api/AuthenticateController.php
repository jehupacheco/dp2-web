<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Token;
use App\Models\Client;
use Carbon\Carbon;

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
        $now = Carbon::now();
        $organization = $client->organization()->get()->first();
        $sensors = $organization->sensors()->get();
        $currentRentings = $client->rentings()->where('starts_at', '<=', $now)->where('finishes_at', '>=', $now)->get();
        $parking_ip = '';

        if ($currentRentings->count() > 0) {
            foreach ($currentRentings as $renting) {
                if ($renting->vehicle()->get()->first()->organization()->get()->first()->is_parking) {
                    $parking_ip = $renting->vehicle()->get()->first()->mac;
                }
            }
        }

        return response()->json(compact('token', 'id', 'organization', 'sensors', 'parking_ip'));
    }
}
