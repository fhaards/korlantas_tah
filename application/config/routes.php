<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/

$route['default_controller'] = 'PUB_Controller/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/*
| -------------------------------------------------------------------------
| Auth
| -------------------------------------------------------------------------
*/


//Authentication
$route['auth'] = 'Auth';
$route['auth/destroy'] = 'Auth/destroy';

/*
| -------------------------------------------------------------------------
| ----------------------------  API ---------------------------------------
| -------------------------------------------------------------------------
*/

//----------- API/JSON Lokasi
$route['api/lokasi'] = 'API_Lokasi';
$route['api/lokasi/show/(:any)'] = 'API_Lokasi/show/$1';
$route['api/lokasi/show-counter/(:any)'] = 'API_Lokasi/showCounter/$1';
$route['api/lokasi/add'] = 'API_Lokasi/insert';
$route['api/lokasi/delete/(:any)'] = 'API_Lokasi/delete/$1';
$route['api/lokasi/edit/(:any)'] = 'API_Lokasi/edit/$1';
$route['api/lokasi/update/(:any)'] = 'API_Lokasi/update/$1';

//----------- API/JSON Kecelakaan
// $route['api/laka'] = 'API_Laka';
$route['api/laka/show'] = 'API_Laka/show';
$route['api/laka/show-by-lokasi/(:any)'] = 'API_Laka/show/$1';
$route['api/laka/detail/(:any)'] = 'API_Laka/detail/$1';
$route['api/laka/add'] = 'API_Laka/insert';
$route['api/laka/delete/(:any)'] = 'API_Laka/delete/$1';
$route['api/laka/edit/(:any)'] = 'API_Laka/edit/$1';
$route['api/laka/update/(:any)'] = 'API_Laka/update/$1';

//----------- API/JSON Korban
$route['api/korban/add'] = 'API_Korban/insert';
$route['api/korban/show/(:any)'] = 'API_Korban/show/$1';
$route['api/korban/show-korban/(:any)'] = 'API_Korban/showKorban/$1';
$route['api/korban/detail/(:any)'] = 'API_Korban/detail/$1';
$route['api/korban/delete/(:any)'] = 'API_Korban/delete/$1';
$route['api/korban/edit/(:any)'] = 'API_Korban/edit/$1';
$route['api/korban/update/(:any)'] = 'API_Korban/update/$1';

//----------- API/JSON Statistik 
$route['api/statistik/insiden/tahun/(:any)'] = 'API_Statistik/statistikInsidenTahun/$1';
$route['api/statistik/insiden/jenis-laka-all/(:any)'] = 'API_Statistik/statistikInsidenJenisLakaAll/$1';
$route['api/statistik/insiden/jenis-laka-by-month/(:any)'] = 'API_Statistik/statistikInsidenJenisLakaByMonth/$1';
$route['api/statistik/korban-tahun-bulan/(:any)/(:any)'] = 'API_Statistik/statistikKorbanTahunBulan/$1/$2';

/*
| -------------------------------------------------------------------------
| --------------------------- WEB -----------------------------------------
| -------------------------------------------------------------------------
*/
//----------- Lokasi
$route['lokasi'] = 'WEB_Lokasi';
$route['lokasi/index'] = 'WEB_Lokasi/index';
$route['lokasi/add'] = 'WEB_Lokasi/add';
$route['lokasi/detail/(:any)'] = 'WEB_Lokasi/detail/$1';

//----------- Kecelakaan
$route['laka'] = 'WEB_Laka';
$route['laka/show'] = 'WEB_Laka/show';
$route['laka/detail/(:any)'] = 'WEB_Laka/detail/$1';

//----------- Laporan
$route['laporan/lokasi'] = 'WEB_Laporan/laporanLokasi';
$route['laporan/lokasi/(:any)'] = 'WEB_Laporan/laporanLokasi/$1';

$route['laporan/laka'] = 'WEB_Laporan/laporanLaka';
$route['laporan/laka/(:any)'] = 'WEB_Laporan/laporanLaka/$1';


/*
| -------------------------------------------------------------------------
| --------------------------- PUBLIC --------------------------------------
| -------------------------------------------------------------------------
*/

$route['beranda'] = 'PUB_Controller/showBeranda';
$route['titik_rawan'] = 'PUB_Controller/showTitikRawan';

$route['statistik/insiden/show'] = 'PUB_Controller/showStatistikInsiden';
$route['statistik/korban/show'] = 'PUB_Controller/showStatistikKorban';
