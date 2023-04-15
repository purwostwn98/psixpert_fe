<?php

namespace App\Controllers;

use App\Libraries\ApiHelper;
use App\Models\PertanyaanModels;
use Google_Client;
use Google_Service_Oauth2;

class Home extends BaseController
{
    protected $pertanyaanModel;

    public function __construct()
    {
        $this->pertanyaanModel = new PertanyaanModels();
        
        
    }

    public function index()
    {        
        $url_callback = $this->session->get('url_callback');
        if($url_callback){

            return redirect()->to($url_callback);
        }
      
        $locale = $this->request->getLocale();
        $response = $this->ApiHelper->get("/api/$locale/list-instrument");
        $data = [
            'instrumen' => $response['data'],
            'data_user' => false
        ];
        if ($this->session->get('login') == true) {
            $data_user = $this->ApiHelper->get("/api/auth/profile-user", true);
            $data['data_user'] = $data_user;
        }
        return view('front/index', $data);
    }

    public function quiz()
    {
        $instrument = $this->request->getVar('instrument');
        $locale = $this->request->getLocale();
        if ($this->session->get('login') != true) {
            $url_callback = base_url("$locale/home/quiz?instrument=$instrument");
            $session_data = [
                'url_callback' => $url_callback,
            ];
            $this->session->set($session_data);
            if($locale == 'id'){
                session()->setFlashData('error', 'Untuk mengisi survei anda harus login terlebih dahulu');
            }else{
                session()->setFlashData('error', 'To fill out the survey you must first login');

            }
            return redirect()->to("$locale/auth/login?instrument=$instrument");
        } else {
            $data_pertanyaan = $this->ApiHelper->get("/api/$locale/list-pertanyaan-survei?instrument=$instrument");
            $data =
                [
                    "pertanyaan" => $data_pertanyaan['data']['data_result'],
                    "jumlah_pilihan" => $data_pertanyaan['data']['jumlah_pilihan'],
                    "nama_instrument" => $data_pertanyaan['data']['nama_instrument']
                ];
            return view('front/quiz', $data);
        }
    }


    public function quiz_survei($code_survei)
    {
        

        $locale = $this->request->getLocale();
        $url_callback = base_url("$locale/survey/$code_survei");
        $session_data = [
            'url_callback' => $url_callback,
        ];
        $this->session->set($session_data);
        
        
        $instrument = $this->request->getVar('instrument');
        if ($this->session->get('login') != true) {
            if($locale == 'id'){
                session()->setFlashData('error', 'Untuk mengisi survei anda harus login terlebih dahulu');
            }else{
                session()->setFlashData('error', 'To fill out the survey you must first login');

            }
            return redirect()->to("$locale/auth/login");
        } else {
            // check date survey expired
            $endpoint = "/api/get-survei-peneliti?code_survei=$code_survei";
            $data_survei = $this->ApiHelper->get($endpoint, true);
            $end_date = strtotime($data_survei->data->end_date);
            $result = $end_date - strtotime('today UTC');
            $days = $result / 86400;        
            // link survey expired
            if($days < 0.5){
                return view('front/quiz_expired');
            }
            
            $data_pertanyaan = $this->ApiHelper->get("/api/$locale/list-pertanyaan-survei?code_survei=$code_survei");
            if($this->request->getVar('quiz') == 1){
                $this->session->remove('url_callback');

                $data =
                    [
                        "pertanyaan" => $data_pertanyaan['data']['data_result'],
                        "jumlah_pilihan" => $data_pertanyaan['data']['jumlah_pilihan'],
                        "nama_instrument" => $data_pertanyaan['data']['nama_instrument'],
                        "id_instrument" => $data_pertanyaan['data']['id_instrument'],
                        "url_callback" => $url_callback
                    ];
                return view('front/quiz_survei', $data);

            }else{
                return redirect()->to("$locale/home/instrument-detail?instrument=".$data_pertanyaan['data']['id_instrument']."&take_survey=1");

            }

        }
    }

    public function simpan_survei()
    {
        $this->session->remove('url_callback');
        $code_survei = $this->request->getVar('survei');
        $instrument = $this->request->getVar('instrument');

        if($code_survei){
            $enpoint = "/api/submit-quiz/$instrument?survei=$code_survei";

        }else{
            $enpoint = "/api/submit-quiz/$instrument";

        }
        $response = $this->ApiHelper->post($enpoint, $_POST);
        if($response){
            $locale = $this->request->getLocale();
            return redirect()->to("$locale/home/hasil-survei?instrument=$instrument"."&take_on=".$response['messages']['created_at']);
        }

    }

    public function instrument_detail()
    {

        $instrument = $this->request->getVar('instrument');
        $locale = $this->request->getLocale();
        $response = $this->ApiHelper->get("/api/$locale/detail-instrument?instrument=$instrument");
        
        $data = [
            "data_instrument" => $response['data'],
            "id_instrument" => $instrument
        ];

        if ($this->session->get('login') == true) {
            $data_user = $this->ApiHelper->get("/api/auth/profile-user", true);
            $data['data_user'] = $data_user;
        }
        
        return view('front/instrument_detail', $data);
    }

    public function hasil_survei()
    {
        $locale = $this->request->getLocale();
        $instrument = $this->request->getVar('instrument');
        $take_on = $this->request->getVar('take_on');
        $take_on = str_replace(" ","%20",$take_on);
        $endpoint = "/api/$locale/hasil-quiz?instrument=".$instrument."&take_on=$take_on";
        $data_hasil_survei = $this->ApiHelper->get($endpoint, true);
        $data = [
                "hasil_survei" => $data_hasil_survei->data
            ]; 
        return view('front/hasil_survei', $data);
    }

    public function riwayat_netizen()
    {
        $locale = $this->request->getLocale();
        $riwayat = $this->ApiHelper->get("/api/$locale/list-hasil-survei-netizen", true);
        $data =
            [
                "riwayat" => $riwayat->data
            ];
        return view('front/riwayat_netizen', $data);
    }
}
