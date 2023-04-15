<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Admin extends BaseController
{
    protected $pertanyaanModel;
    protected $ApiHelper;

    public function __construct()
    {
    }


    public function dashboard_adm()
    {

        $year = $this->ApiHelper->get("/api/get-jumlah-respondent?filter=year", true);
        $today = $this->ApiHelper->get("/api/get-jumlah-respondent?filter=today", true);
        $month = $this->ApiHelper->get("/api/get-jumlah-respondent?filter=month", true);
        $all = $this->ApiHelper->get("/api/get-jumlah-respondent?filter=all", true);
        $statistik_respondent = $this->ApiHelper->get("/api/get-statistik-respondent", true);
        $statistik_peneliti = $this->ApiHelper->get("/api/get-statistik-peneliti", true);
        $data = [
            'year' => $year->data,
            'today' => $today->data,
            'month' => $month->data,
            'all' => $all->data,
            'statistik_respondent' => $statistik_respondent->data,
            'statistik_peneliti' => $statistik_peneliti->data,
        ];

        return view('admin/dashboard_admin', $data);
    }


    public function daftar_responden()
    {

        $data_respondent = $this->ApiHelper->get('/api/list-instrumen-respondent', true);
        $data = [
            'data_respondents' => $data_respondent->data
        ];

        return view('admin/daftar_responden', $data);
    }


    public function daftar_responden_2()
    {
        $endpoint = "/api/list-respondent?instrument=" . $this->request->getVar('instrument');
        $respondent_by_instrument = $this->ApiHelper->get($endpoint, true);
        $data = [
            'data' => $respondent_by_instrument->data
        ];

        return view('admin/daftar_responden_2', $data);
    }


    public function detail_responden()
    {
        $instrument = $this->request->getVar('instrument');
        $user = $this->request->getVar('user');
        $take_on = $this->request->getVar('take_on');
        $take_on = str_replace(" ", "%20", $take_on);
        $endpoint = "/api/detail-respondent?instrument=$instrument&user=$user&take_on=$take_on";
        $detail_respondent = $this->ApiHelper->get($endpoint, true);
        $data = [
            'data' => $detail_respondent->data
        ];

        return view('admin/detail_survei_responden', $data);
    }


    public function data_instrumen()
    {
        $data_instrument = $this->ApiHelper->get('/api/id/list-instrument', True);
        $data = [
            'data_instrument' => $data_instrument->data
        ];
        return view('admin/data_instrumen', $data);
    }

    public function export_excel()
    {

        // if ($this->request->getVar('instrument')) {
        //     $tgAwal = $this->request->getVar('tgAwal');
        //     $tgAhir = $this->request->getVar('tgAkhir');
        //     $tgl = explode('-', $tgAwal);
        //     $tgl2 = explode('-', $tgAhir);
        //     $tglAwal = $tgl[2] . ' ' . $this->bulan[(int)$tgl[1]] . ' ' . $tgl[0];
        //     $tglAkhir = $tgl2[2] . ' ' . $this->bulan[(int)$tgl2[1]] . ' ' . $tgl2[0];
        //     $label = $tglAwal . ' - ' . $tglAkhir;
        // } else {
        //     $tgAwal = 0000 - 00 - 00;
        //     $tgAhir = new Time('now', 'Asia/Jakarta', 'en_US');
        //     $tglAwal = "Semua Data";
        //     $tglAkhir = "";
        //     $label = 'semua data';
        // }

        $file_excel = $_SERVER["DOCUMENT_ROOT"] . '/template_excel/' . 'template_report.xlsx';
        $reader = IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($file_excel);

        // Keterangan filter
        // $spreadsheet->setActiveSheetIndexByName('report_ajuan')
        //     ->setCellValue('B7', 'Filter : ' . $label);

        // Query Ajuan
        $kodeInstrumen = $this->request->getVar('instrument');
        $endpoint = "/api/export-respondent?instrument=" . $this->request->getVar('instrument');
        $data = $this->ApiHelper->get($endpoint);
        // dd($data);
        // exit;
        $no = 0;
        $CurrentRow = 9;
        foreach ($data['data'] as $n) {
            $spreadsheet->setActiveSheetIndexByName('report_ajuan')
                ->setCellValue('A' . $CurrentRow, $no + 1)
                ->setCellValue('B' . $CurrentRow, $n['take_on'])
                ->setCellValue('C' . $CurrentRow, $n["code_survei"])
                ->setCellValue('D' . $CurrentRow, $n['email'])
                // ->setCellValue('D' . $CurrentRow, sprintf("%d", $n['nik']))
                ->setCellValue('E' . $CurrentRow, $n['nama_lengkap'])
                ->setCellValue('F' . $CurrentRow, $n['jenis_kelamin'])
                ->setCellValue('G' . $CurrentRow, $n['status_pernikahan'])
                ->setCellValue('H' . $CurrentRow, $n['tanggal_lahir'])
                ->setCellValue('I' . $CurrentRow, $n['negara'])
                ->setCellValue('J' . $CurrentRow, $n['provinsi'])
                ->setCellValue('K' . $CurrentRow, $n['kota'])
                ->setCellValue('L' . $CurrentRow, $n['agama'])
                ->setCellValue('M' . $CurrentRow, $n['instansi'])
                ->setCellValue('N' . $CurrentRow, $n['score'])
                ->setCellValue('O' . $CurrentRow, $n['label']);
            $CurrentRow++;
            $no++;
        }

        // $spreadsheet->getActiveSheet()->getStyle('A9:A' . $CurrentRow)
        //     ->getNumberFormat()
        //     ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

        // for ($i = $CurrentRow; $i <= 350; $i++) {
        //     $spreadsheet->setActiveSheetIndexByName('report_ajuan')->getRowDimension($i)->setOutlineLevel(1);
        //     $spreadsheet->setActiveSheetIndexByName('report_ajuan')->getRowDimension($i)->setVisible(false);
        // }
        // $spreadsheet->setActiveSheetIndexByName('report_ajuan')->getRowDimension(351)->setCollapsed(true);

        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=report_ajuan_.xlsx");
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        $writer->save('php://output');
        exit();
    }


    public function detail_instrumen()
    {
        if ($_POST) {
            $data_instrument = $_POST;
            $data_instrument =  http_build_query($data_instrument, '', '&', PHP_QUERY_RFC3986);
            $endpoint = "/api/edit-instrument?instrument=" . $this->request->getVar('instrument');
            $result = $this->ApiHelper->put($endpoint, $data_instrument);
            $locale = $this->request->getLocale();
            if ($result) {
                session()->setFlashData('success', $result['messages']['success']);
                return redirect()->to(base_url(base_url() . '/' . $locale . "/admin/detail-instrumen?instrument=" . $this->request->getVar('instrument')));
            }
        }

        $endpoint = "/api/id/detail-instrument?instrument=" . $this->request->getVar('instrument');
        $detail_instrument = $this->ApiHelper->get($endpoint, True);

        $data = [
            'detail_instrument' => $detail_instrument->data
        ];

        return view('admin/detail_instrumen', $data);
    }


    public function data_pertanyaan()
    {
        if ($_POST) {
            $endpoint = "/api/tambah-pertanyaan?instrument=" . $this->request->getVar('instrument');
            $data =  array('soal' => $this->request->getVar('soal'), 'soal_eng' => $this->request->getVar('soal_eng'));
            $result = $this->ApiHelper->post($endpoint, $data);
            session()->setFlashData('success', $result['messages']['success']);
            $url = '/id/admin/data-pertanyaan?instrument=' . $this->request->getVar('instrument') . '&language=id';
            return redirect()->to(base_url($url));
        }
        $endpoint = "/api/id/list-pertanyaan?instrument=" . $this->request->getVar('instrument');
        $data_pertanyaan = $this->ApiHelper->get($endpoint, true);
        $data = [
            'data' => $data_pertanyaan->data
        ];
        return view('admin/data_pertanyaan', $data);
    }

    public function detele_pertanyaan()
    {
        $id_pertanyaan = $this->request->getVar('id_pertanyaan');

        $endpoint = "/api/detele-pertanyaan" . $id_pertanyaan;
        $result = $this->ApiHelper->delete($endpoint);
        if ($result['status'] == 200) {
            session()->setFlashData('success', $result['messages']['success']);
            $url = 'id/admin/data-pertanyaan?instrument=' . $this->request->getVar('instrument') . "&language=id";
            return redirect()->to(base_url($url));
        } else {
            session()->setFlashData('error', 'Detele data pertanyaan error');
            $url = 'id/admin/data-pertanyaan?instrument=' . $this->request->getVar('instrument') . "&language=id";
            return redirect()->to(base_url($url));
        }
    }

    public function edit_pertanyaan()
    {
        $id_pertanyaan = $this->request->getVar('id_pertanyaan');
        $instrument = $this->request->getVar('instrument');
        $data =  array('soal' => $this->request->getVar('soal'), 'soal_eng' => $this->request->getVar('soal_eng'));
        $data = http_build_query($data, '', '&', PHP_QUERY_RFC3986);
        $endpoint = "/api/edit-pertanyaan" . $id_pertanyaan;
        $result = $this->ApiHelper->put($endpoint, $data);
        if ($result['status'] == 200) {
            session()->setFlashData('success', $result['messages']['success']);
            $url = '/id/admin/data-pertanyaan?instrument=' . $this->request->getVar('instrument') . '&language=id';;
            return redirect()->to(base_url($url));
        } else {
            session()->setFlashData('error', 'Detele data pertanyaan error');
            $url = '/id/admin/data-pertanyaan?instrument=' . $this->request->getVar('instrument') . '&language=id';;
            return redirect()->to(base_url($url));
        }
    }


    public function tambah_instrumen()
    {
        if ($_POST) {
            $data = $this->request->getVar();
            $result = $this->ApiHelper->post('/api/tambah-instrument', $data);
            if ($result) {
                session()->setFlashData('success', $result['messages']['success']);
                return redirect()->to(base_url('/id/admin/data-instrumen'));
            }
        }

        return view('admin/tambah_instrumen');
    }


    public function manajemen_user()
    {
        if ($_POST) {
            $endpoint = "/api/auth/edit-user/" . $this->request->getVar('user');
            $data = [
                'level_user' => $this->request->getVar('level_user')
            ];
            $data = http_build_query($data, '', '&', PHP_QUERY_RFC3986);
            $result = $this->ApiHelper->put($endpoint, $data);
            if ($result['status'] == 200) {
                session()->setFlashData('success', $result['messages']['success']);
            } else {
                session()->setFlashData('error', $result['messages']['error']);
            }
            return redirect()->to(base_url('/id/admin/manajemen-user'));
        }
        $endpoint = "/api/auth/list-user";
        $data_user = $this->ApiHelper->get($endpoint, true);
        $data = [
            'data_user' => $data_user->data
        ];
        return view('admin/tabel_user', $data);
    }

    public function list_req_peneliti()
    {
        if ($_POST) {
            $endpoint = "/api/auth/edit-peneliti/" . $this->request->getVar('user');
            $data = [
                'level_user' => $this->request->getVar('level_user'),
                'status' => $this->request->getVar('status')
            ];
            $data = http_build_query($data, '', '&', PHP_QUERY_RFC3986);
            $result = $this->ApiHelper->put($endpoint, $data);
            if ($result) {
                session()->setFlashData('success', $result['messages']['success']);
                return redirect()->to(base_url('/id/admin/manajemen-user'));
            }
        }
        $endpoint = "/api/auth/list-peneliti";
        $data_peneliti = $this->ApiHelper->get($endpoint, true);
        $data = [
            'data_user' => $data_peneliti->data
        ];
        return view('admin/tabel_req_peneliti', $data);
    }
}
