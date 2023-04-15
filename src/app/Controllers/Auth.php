<?php

namespace App\Controllers;

use App\Models\PertanyaanModels;
use Google_Client;
use Google_Service_Oauth2;

class Auth extends BaseController
{
    protected $pertanyaanModel;

    public function __construct()
    {
        $this->pertanyaanModel = new PertanyaanModels();
    }

    public function login()
    {
        $clientID = '836699979978-dcrv2lruitpr983nnk6fbpmfa9adfkfi.apps.googleusercontent.com';
        $clientSecret = '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';
        $redirectUri = getenv('redirectUri');

        $google_client = new Google_Client();
        $google_client->setClientId($clientID);
        $google_client->setClientSecret($clientSecret);
        $google_client->setRedirectUri($redirectUri);
        $google_client->addScope("email");
        $google_client->addScope("profile");
        if (isset($_GET["code"])) {
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
            if (!isset($token["error"])) {
                
                $result = $this->ApiHelper->post("/api/auth/login-google/$token[access_token]", true);
                if($result['status'] == 200){
                    $session_data = [
                        'login' => true,
                        'token' => $result['data']['token'],
                        'email' => $result['data']['email'],
                        'nama_user' => $result['data']['nama_lengkap'],
                        'level_user' => $result['data']['level_user'],
                        // 'url_callback' => false  
                    ];
                    $this->session->set($session_data);
                    $locale = $this->request->getLocale();
                    return redirect()->to("$locale/");

                }
            }
        }

        $data = [
            'google_auth_url' => $google_client->createAuthUrl(),
        ];
        return view('auth/login_oauth', $data);
    }

    public function update_profile_user()
    {
        $this->session->set(['akademik'=>$this->request->getVar('akademik')]);
        $data =  [
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'negara' => $this->request->getVar('negara'),
            'provinsi' => $this->request->getVar('provinsi'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'kota' => $this->request->getVar('kota'),
            'agama' => $this->request->getVar('agama'),
            'status_pernikahan' => $this->request->getVar('status_pernikahan'),
            'instansi' => $this->request->getVar('instansi'),
            'akademik' => $this->request->getVar('akademik'),
        ];
        print_r($data); die;
        $updated = $this->ApiHelper->post('/api/auth/update-profile-user', $data);
        if($updated){
            $locale = $this->request->getLocale();
            if ($locale == 'en'){
                session()->setFlashData('success', "Your profile has been updated successfully");
            }else{
                session()->setFlashData('success', "Profil kamu berhasil diperbarui");
            }
            return redirect()->to("$locale/");
        }

        
    }

    public function cek_user()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'api.assessme.puslogin.com/api/auth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $this->request->getVar('username'), 'password' => $this->request->getVar('password')),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response_data = json_decode($response, true);

        if ($response_data['status'] == 200) {
            $dapat_session = [
                'login' => true,
                'token' => $response_data['data']['token'],
                'email' => $this->request->getVar('username'),
                'nama_user' => $response_data['data']['nama_lengkap'],
                'level_user' => $response_data['data']['level_user']
            ];
            $this->session->set($dapat_session);

            if ($response_data['data']['level_user'] == 'peneliti') {
                $msg = [
                    'berhasil' => [
                        'link' => '/peneliti',
                        'pesan' => 'You have successfully logged in as a researcher'
                    ]
                ];
            } elseif ($response_data['data']['level_user'] == 'admin') {
                $msg = [
                    'berhasil' => [
                        'link' => '/admin',
                        'pesan' => 'You have successfully logged in as a administrator'
                    ]
                ];
            } else {
                $a = $this->request->getVar('a');
                if ($a == 0) {
                    $msg = [
                        'berhasil' => [
                            'link' => '/',
                            'pesan' => 'You have successfully logged in'
                        ]
                    ];
                } else {
                    $msg = [
                        'berhasil' => [
                            'link' => "/home/quiz?instrument=" . $a,
                            'pesan' => 'You have successfully logged in'
                        ]
                    ];
                }
            }
        } elseif ($response_data['status'] == 404) {
            $msg = [
                'gagal' => [
                    'link' => '/',
                    'pesan' => 'You failed to login'
                ]
            ];
        }
        echo json_encode($msg);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }

    public function formulir_peneliti()
    {
        $data = [
            'lembaga' => $this->request->getVar('lembaga'),
            'keperluan' => $this->request->getVar('keperluan')
        ];
        $request = $this->ApiHelper->post("/api/auth/register-peneliti", $data, true);
        if($request->status == 200){
            $locale = $this->request->getLocale();
            if ($locale == 'en'){
                session()->setFlashData('swal_success', "Your form has been successfully submitted");
            }else{
                session()->setFlashData('swal_success', "Formulir anda berhasil di submit");
            }
            return redirect()->to("$locale/");
        }
    }

    public function status_peneliti()
    {
        $status = $this->ApiHelper->get('/api/auth/get-peneliti');
        echo json_encode($status);
    }
}
