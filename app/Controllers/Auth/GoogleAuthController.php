<?php

namespace App\Controllers\Auth;

use App\Models\Admin\Users\UsersModel;
use App\Models\External\Google\GoogleAuthModel;
use CodeIgniter\Controller;

class GoogleAuthController extends Controller
{
    public function googleLogin()
    {
        $google_auth_url = GoogleAuthModel::getAuthUrl();
        return redirect()->to($google_auth_url);
    }

    public function googleCallback()
    {
        $session = \Config\Services::session();
        $session->start();

        if ($this->request->getGet('code')) {
            $code = $this->request->getGet('code');
            $token = GoogleAuthModel::getToken($code);

            $token_data = json_decode($token, true);

            if (isset($token_data['access_token'])) {
                $google_user_info = GoogleAuthModel::getUserInfo($token_data);
                $google_user_info = json_decode($google_user_info, true);


                if (!empty($google_user_info) && isset($google_user_info['id'])) {
                    # check if google account already exists
                    $users_model = new UsersModel();
                    $user_info = $users_model->where(['GOOGLE_ID' => $google_user_info['id']])->withUserType()->first();

                    if (!$user_info) {
                        $users_model->insert([
                            'GOOGLE_ID' => $google_user_info['id'],
                            'GIVEN_NAME' => $google_user_info['given_name'],
                            'FAMILY_NAME' => $google_user_info['family_name'],
                            'EMAIL' => $google_user_info['email'],
                            'IMAGE' => $google_user_info['picture'],
                            'USER_TYPE_ID' => 2,
                        ]);

                        $user_info = $users_model->where(['GOOGLE_ID' => $google_user_info['id']])->withUserType()->first();
                    }

                    $session_data = $user_info;

                    $session->set($session_data);
                    return redirect()->to($session->get('PREV_URL'));
                }
            }
        }

        return redirect()->to(base_url('auth/login'));
        // throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
}
