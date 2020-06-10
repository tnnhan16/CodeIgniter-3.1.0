<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| BREADCRUMB CONFIG
| -------------------------------------------------------------------
| This file will contain some breadcrumbs' settings.
|
| $config['crumb_divider']		The string used to divide the crumbs
| $config['tag_open'] 			The opening tag for breadcrumb's holder.
| $config['tag_close'] 			The closing tag for breadcrumb's holder.
| $config['crumb_open'] 		The opening tag for breadcrumb's holder.
| $config['crumb_close'] 		The closing tag for breadcrumb's holder.
|
| Defaults provided for twitter bootstrap 2.0
*/

$config['breadcrumbs'] = [
    'router' => [
        //page trang chủ
        'admin' => 'Trang chủ',
        //page bài viết
        'admin/baiviet' => 'Bài viết',
        'admin/baiviet/insert' => 'Thêm mới bài viết',
        'admin/baiviet/edit' => 'Sửa bài viết',
        'admin/baiviet/delete' => 'Xóa bài viết',
        //page export csv
        'admin/download-csv' => 'Export file csv',
        //page export pdf
        'admin/download-pdf' => 'Export file pdf',
        //page export pdf
        'admin/exportxls' => 'Export file excel',
        //page upload file
        'admin/uploadfile' => 'Export upload file',
        'admin/uploadfile/insert' => 'Export upload file insert',
        'admin/uploadfile/edit' => 'Export upload file edit',
        'admin/uploadfile/delete' => 'Export upload file delete',
        //page user
        'admin/user' => 'Người dùng',
        'admin/user/insert' => 'Thêm mới người dùng',
        'admin/user/edit' => 'Sửa người dùng',
        'admin/user/delete' => 'Xóa người dùng',
         'admin/user/importcsv' => 'Import người dùng',


    ],
];

/* End of file breadcrumbs.php */
/* Location: ./application/config/breadcrumbs.php */