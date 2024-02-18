<?php
namespace App\Helpers\Authentication;
use Firebase\JWT\JWT;
class AuthenticationHelper
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //`
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ExampleEvent  $event
     * @return void
     */
    public function generate_access_token($data)
    {
        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => 123, // Subject of the token
            'iat' => time(), // Time when JWT was issued. 
            'exp' => time() + 60*60, // Expiration time
            'id_user' => $data
        ];
        
        // As you can see we are passing `JWT_SECRET` as the second parameter that will 
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_SECRET'), 'HS256');
    }
}
