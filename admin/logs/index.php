<?php

require '../../_init.php';
require '../../_admin.php';

$data = [
    'active' => 'logs',
    'logs' => dbGetLogs(),
];

displayAdmin('admin/logs.tpl', $data);