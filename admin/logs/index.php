<?php

require '../../_functions/_init.php';
require '../../_functions/_admin.php';

$data = [
    'active' => 'logs',
    'logs' => dbGetLogs(),
];

displayAdmin('admin/log/logs.tpl', $data);