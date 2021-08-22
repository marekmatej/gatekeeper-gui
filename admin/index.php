<?php

require '../_init.php';
require '../_admin.php';

$data = [
    'active' => 'dashboard',
];

displayAdmin('admin/dashboard.tpl', $data);