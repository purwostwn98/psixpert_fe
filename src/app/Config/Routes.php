<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('{locale}/', 'Home::index');
$routes->get('{locale}/home/quiz', 'Home::quiz');
$routes->get('{locale}/home/instrument-detail', 'Home::instrument_detail');
$routes->get('{locale}/home/hasil-survei', 'Home::hasil_survei', ['filter' => 'auth']);
$routes->get('{locale}/home/riwayat-netizen', 'Home::riwayat_netizen', ['filter' => 'auth']);
$routes->post('{locale}/home/simpan-survei', 'Home::simpan_survei', ['filter' => 'auth']);
$routes->get('{locale}/survey/(:any)', 'Home::quiz_survei/$1');


// admin
$routes->get('{locale}/admin', 'Admin::dashboard_adm', ['filter' => 'auth_admin']);
$routes->get('{locale}/admin/daftar-responden', 'Admin::daftar_responden', ['filter' => 'auth_admin']);
$routes->get('{locale}/admin/daftar-responden-2', 'Admin::daftar_responden_2', ['filter' => 'auth_admin']);
$routes->get('{locale}/admin/detail-responden', 'Admin::detail_responden', ['filter' => 'auth_admin']);
$routes->get('{locale}/admin/data-instrumen', 'Admin::data_instrumen', ['filter' => 'auth_admin']);
$routes->get('{locale}/admin/export_excel', 'Admin::export_excel', ['filter' => 'auth_admin']);

$routes->post('{locale}/admin/delete-pertanyaan', 'Admin::detele_pertanyaan', ['filter' => 'auth_admin']);
$routes->post('{locale}/admin/edit-pertanyaan', 'Admin::edit_pertanyaan', ['filter' => 'auth_admin']);
$routes->match(['post', 'get'], '{locale}/admin/detail-instrumen', 'Admin::detail_instrumen', ['filter' => 'auth_admin']);
$routes->match(['post', 'get'], '{locale}/admin/data-pertanyaan', 'Admin::data_pertanyaan', ['filter' => 'auth_admin']);
$routes->match(['post', 'get'], '{locale}/admin/form-tambah-instrumen', 'Admin::tambah_instrumen', ['filter' => 'auth_admin']);

$routes->match(['post', 'get'], '{locale}/admin/manajemen-user', 'Admin::manajemen_user', ['filter' => 'auth_admin']);
$routes->match(['post', 'get'], '{locale}/admin/list-req-peneliti', 'Admin::list_req_peneliti', ['filter' => 'auth_admin']);
$routes->get('/translate-me', 'Admin::translate_me');
// admin


// peneliti
$routes->match(['post', 'get'], '{locale}/peneliti', 'Peneliti::dashboard_peneliti', ['filter' => 'auth_peneliti']);
$routes->get('{locale}/peneliti/pilih-instrumen', 'Peneliti::pilih_instrumen', ['filter' => 'auth_peneliti']);
$routes->get('{locale}/peneliti/daftar-responden-survei', 'Peneliti::daftar_responden_survei', ['filter' => 'auth_peneliti']);
$routes->get('{locale}/peneliti/detail-responden-survei', 'Peneliti::detail_responden_survei', ['filter' => 'auth_peneliti']);
$routes->match(['post', 'get'], '{locale}/peneliti/detail-instrumen', 'Peneliti::detail_instrumen', ['filter' => 'auth_peneliti']);
$routes->match(['post', 'get'], '{locale}/peneliti/delete-survey', 'Peneliti::delete_survey', ['filter' => 'auth_peneliti']);
$routes->get('{locale}/peneliti/export_excel', 'Peneliti::export_excel', ['filter' => 'auth_peneliti']);
// end peneliti

$routes->get('{locale}/auth/login', 'Auth::login');
$routes->get('{locale}/auth/logout', 'Auth::logout');
$routes->post('/auth/cek_user', 'Auth::cek_user');
// $routes->get('/auth/login-cas', 'Auth::login_cas');
$routes->post('{locale}/auth/update-profile-user', 'Auth::update_profile_user');
$routes->post('{locale}/formulir-peneliti', 'Auth::formulir_peneliti', ['filter' => 'auth']);
$routes->get('{locale}/status-peneliti', 'Auth::status_peneliti', ['filter' => 'auth']);

$routes->post('{locale}/dinamis/form-answer-option', 'Dinamis::form_answer_option');
$routes->post('{locale}/dinamis/tabel-pertanyaan-bahasa', 'Dinamis::tabel_pertanyaan_bahasa');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
