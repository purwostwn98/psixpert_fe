<?php

namespace App\Controllers;

use App\Models\PertanyaanModels;

class Dinamis extends BaseController
{
    protected $pertanyaanModel;

    public function __construct()
    {
        $this->pertanyaanModel = new PertanyaanModels();
    }

    public function form_answer_option()
    {
        if ($this->request->isAJAX()) {
            $jumlah = $this->request->getVar('jumlah');
            $data = [
                'jumlah' => $jumlah
            ];
            $msg = [
                'data' => view('admin/dinamis_view/form_answer_option', $data),
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function tabel_pertanyaan_bahasa()
    {
        if ($this->request->isAJAX()) {
            $bahasa = $this->request->getVar('bahasa');
            $data = [
                'bahasa' => $bahasa
            ];
            $msg = [
                'data' => view('admin/dinamis_view/tabel_pertanyaan_bahasa', $data),
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
}
