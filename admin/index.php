<?php

require '../_functions/_init.php';
require '../_functions/_admin.php';

$data = [
    'active' => 'dashboard',
];

displayAdmin('admin/dashboard.tpl', $data);