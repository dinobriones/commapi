<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;



class AuthController extends Controller
{
    public function login(Request $request)
    {
        $http = new \GuzzleHttp\Client;
        // dd($http);
        try {
            $response = $http->post('http://commapi.ppa.com.ph/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => 2,
                    'client_secret' => 'rNh0e16NChWcOkJlwRQCH0C7ScTdjiNHUOljGMLy',
                    'username' => $request->username,
                    'password' => $request->password,
                    
                ]
            ]);
            // dd($response);
            // dd(User::where('email',$request->username)->first());
            // dd($response->getBody());
            $user = User::where('email',$request->username)->first();
            // return (new UserResource($user))->test($response->getBody());
            // dd($response);
            $body = json_decode((string)$response->getBody());
            return (new UserResource($user))->auth($body);
            // dd($body->access_token);
            // return $response->getBody(true)->getContents();

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode == 400) {
                return response()->json('Invalid request. Please enter a valid email or password.', $e->getCode());
            } else if ($e->getCode == 401) {
                return response()->json('Your credentials are incorrect. Please try again.', $e->getCode());
            }
            return response()->json('Something went wrong on the server.', $e->getCode());
        }
    }
}
