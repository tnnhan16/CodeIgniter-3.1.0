<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Welcome/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin/login'] = 'admin/login/login';
$route['admin/logout'] = 'admin/login/logout';
$route['register'] = 'admin/User/register';
$route['thongbao'] = 'admin/User/thongbao';
$route['admin'] = 'Welcome/index';
$route['admin/baiviet'] = 'admin/BaiViet/index';
$route['admin/baiviet/insert'] = 'admin/BaiViet/insert';
$route['admin/baiviet/edit/:id'] = 'admin/BaiViet/edit';
$route['admin/baiviet/delete/:id'] = 'admin/BaiViet/delete';
$route['admin/download-pdf'] = "admin/ExportPdf/index";
$route['admin/download-pdf/download'] = "admin/ExportPdf/downloadPdf";
$route['admin/download-csv'] = "admin/ExportCsv/index";
$route['admin/download-csv/download'] = "admin/ExportCsv/downloadCsv";
$route['admin/exportxls/download'] = "admin/ExportXls/exportxls";
$route['admin/exportxls'] = "admin/Excel_export/index";
$route['admin/exportxls/action'] = "admin/Excel_export/exportexcel";
$route['admin/exportxls/exportexcel'] = "admin/Excel_export/exportexcelmulti";
$route['admin/uploadfile'] = "admin/UploadFile/index";
$route['admin/uploadfile/insert'] = "admin/UploadFile/insert";
$route['admin/uploadfile/edit/:id'] = 'admin/UploadFile/edit';
$route['admin/uploadfile/delete/:id'] = 'admin/UploadFile/delete';
$route['admin/user'] = 'admin/User/index';
$route['admin/user/insert'] = 'admin/User/insert';
$route['admin/user/edit/:id'] = 'admin/User/edit';
$route['admin/user/delete/:id'] = 'admin/User/delete';
$route['admin/user/importcsv'] = 'admin/ImportUserCsv/importcsv';
$route['admin/user/deleteall'] = 'admin/User/deleteAll';







