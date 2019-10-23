<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $http = new \GuzzleHttp\Client;
        try {
            $response = $http->post('http://172.18.0.1:8002/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => 2,
                    'client_secret' => 'V6hIU84BzIEwarzAOZDuvTzwOURYagmvYivtucDu',
                    'username' => $request->username,
                    'password' => $request->password,
                    
                ]
            ]);
            dd($response);
            return $respons->getBody();

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
