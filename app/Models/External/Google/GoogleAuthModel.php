<?php

namespace App\Models\External\Google;

class GoogleAuthModel
{
    private $REDIRECT_URL;
    private $CLIENT_ID;
    private $CLIENT_SECRET;

    private $REQ_TYPE;
    private $REQ_DATA;
    private $REQ_HEADERS;

    public function __construct()
    {
        $this->CLIENT_ID = env('GOOGLE_CLIENT_ID');
        $this->CLIENT_SECRET = env('GOOGLE_SECRET_KEY');
        $this->REDIRECT_URL = base_url('/auth/google-callback');
    }

    public function request()
    {
        $links = [
            'auth_url' => [
                'type' => 'GET',
                'url' => 'https://accounts.google.com/o/oauth2/auth?'
            ],
            'get_token' => [
                'type' => 'POST',
                'url' => 'https://oauth2.googleapis.com/token'
            ],
            'get_user_info' => [
                'type' => 'GET',
                'url' => 'https://www.googleapis.com/oauth2/v2/userinfo'
            ],
        ];

        if ($this->REQ_TYPE == 'auth_url') {
            $res = $links[$this->REQ_TYPE]['url'] . $this->REQ_DATA;
        } else {
            $ch = curl_init($links[$this->REQ_TYPE]['url']);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $links[$this->REQ_TYPE]['type']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            switch ($this->REQ_TYPE) {
                case 'get_token':
                    $post_data = [
                        'client_id' => $this->CLIENT_ID,
                        'client_secret' => $this->CLIENT_SECRET,
                        'redirect_uri' => $this->REDIRECT_URL,
                        'grant_type' => 'authorization_code'
                    ];
                    
                    if (! empty($this->REQ_DATA)) {
                        $post_data = array_merge($post_data, $this->REQ_DATA);
                    }
        
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
                    break;
            }

            if (! empty($this->REQ_HEADERS)) {
                curl_setopt($ch, CURLOPT_HTTPHEADER, $this->REQ_HEADERS);
            }

            $res = curl_exec($ch);
            curl_close($ch);
        }

        return $res;
    }

    public static function getAuthUrl()
    {
        $google_auth = new GoogleAuthModel();
        $google_auth->REQ_TYPE = 'auth_url';
        $google_auth->REQ_DATA = http_build_query([
            'client_id' => $google_auth->CLIENT_ID,
            'redirect_uri' => $google_auth->REDIRECT_URL,
            'response_type' => 'code',
            'scope' => 'email profile',
            'access_type' => 'online'
        ]);

        $res = $google_auth->request();

        return $res;
    }

    public static function getToken($code)
    {
        $google_auth = new GoogleAuthModel();
        $google_auth->REQ_TYPE = 'get_token';
        $google_auth->REQ_HEADERS = ['Content-Type: application/x-www-form-urlencoded'];
        $google_auth->REQ_DATA = [
            'code' => $code
        ];
        $res = $google_auth->request();
        
        return $res;
    }

    public static function getUserInfo($token_data)
    {
        $google_auth = new GoogleAuthModel();
        $google_auth->REQ_TYPE = 'get_user_info';
        $google_auth->REQ_HEADERS = [
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer ' . $token_data['access_token']
        ];
        
        $res = $google_auth->request();
        
        return $res;
    }
}
