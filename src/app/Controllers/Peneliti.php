<?php

namespace App\Controllers;

use App\Models\PertanyaanModels;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Peneliti extends BaseController
{
    protected $pertanyaanModel;

    public function __construct()
    {
        $this->pertanyaanModel = new PertanyaanModels();
    }

    public function dashboard_peneliti()
    {
        if ($_POST) {

            $endpoint = "/api/edit_survei" . $this->request->getVar('edit_endpoint');

            $time = strtotime($this->request->getVar('start_date'));
            $newFormatStartDate = date('Y-m-d', $time);
            $data = [
                'start_date' => $newFormatStartDate,
                'end_date' => $this->request->getVar('end_date')
            ];

            $data = http_build_query($data, '', '&', PHP_QUERY_RFC3986);
            $result = $this->ApiHelper->put($endpoint, $data);
            session()->setFlashData('success', $result['messages']['success']);
            return redirect()->to(base_url($this->locale . "/peneliti"));
        }

        $endpoint = "/api/list-survei-peneliti";
        $data_survei = $this->ApiHelper->get($endpoint, true);

        $data = [
            'data_survei' => $data_survei->data
        ];
        return view('peneliti/dashboard_peneliti', $data);
    }


    public function pilih_instrumen()
    {
        $data_instrument_survei = $this->ApiHelper->get('/api/list-instrument-survei', true);
        $data = [
            'data' => $data_instrument_survei->data
        ];
        return view('peneliti/pilih_instrumen', $data);
    }


    public function detail_instrumen()
    {
        if ($_POST) {
            $instrument = $this->request->getVar('instrument');
            $code_survei = $this->request->getVar('code_survei');

            $endpoint = "/api/create-survei?instrument=$instrument&code_survei=$code_survei";
            $data = [
                'start_date' => $this->request->getVar('start_date'),
                'end_date' => $this->request->getVar('end_date'),
                'language' => $this->request->getVar('language'),
            ];
            $result = $this->ApiHelper->post($endpoint, $data);
            session()->setFlashData('success', $result['messages']['success']);
            return redirect()->to(base_url("$this->locale/peneliti"));
        }
        $language = $_GET['language'];
        $endpoint = "/api/" . $language . "/detail-instrument-survei?instrument=" . $this->request->getVar('instrument');
        $detail_instrument = $this->ApiHelper->get($endpoint, true);
        $endpoint_list_soal = "/api/en/list-pertanyaan?instrument=" . $this->request->getVar('instrument');
        $list_soal = $this->ApiHelper->get($endpoint_list_soal, true);

        $data = [
            'data' => $detail_instrument->data,
            'data_soal' => $list_soal->data->data_pertanyaan
        ];

        return view('peneliti/detail_instrumen', $data);
    }


    public function daftar_responden_survei()
    {
        $instrument = $this->request->getVar('instrument');
        $code_survei = $this->request->getVar('code_survei');
        $endpoint = "/api/detail-survei-peneliti?instrument=$instrument&code_survei=$code_survei";
        $respondent_by_survei = $this->ApiHelper->get($endpoint, true);
        $data = [
            'data' => $respondent_by_survei->data
        ];

        return view('peneliti/daftar_responden_survei', $data);
    }


    public function detail_responden_survei()
    {
        $instrument = $this->request->getVar('instrument');
        $user = $this->request->getVar('user');
        $take_on = $this->request->getVar('take_on');
        $take_on = str_replace(" ", "%20", $take_on);
        $code_survei = $this->request->getVar('code_survei');
        $endpoint = "/api/detail-respondents-survei-peneliti?instrument=$instrument&user=$user&take_on=$take_on&code_survei=$code_survei";
        $result = $this->ApiHelper->get($endpoint, true);
        $data = [
            'data' => $result->data
        ];
        return view('peneliti/detail_survei_responden.php', $data);
    }

    public function delete_survey()
    {
        $code_survei = $this->request->getVar('code_survei');
        $endpoint = "/api/delete-survey?code_survei=$code_survei";
        $result = $this->ApiHelper->delete($endpoint);
        if ($result['status'] == 200) {
            session()->setFlashData('success', $result['messages']['success']);
            return redirect()->to(base_url("$this->locale/peneliti"));
        } else {
            session()->setFlashData('error', $result['messages']['error']);
            return redirect()->to(base_url("$this->locale/peneliti"));
        }
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
        $kodeSurvei = $this->request->getVar('code_survei');
        $endpoint = "/api/export-respondent-peneliti?code_survei=" . $kodeSurvei;
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
}
