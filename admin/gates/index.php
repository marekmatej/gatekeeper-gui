<?php

require '../../_init.php';
require '../../_admin.php';

$gates = dbGetGates();

$data = [
    'active' => 'gates',
    'gates' => $gates,
];

if (isset($_POST['gate']) && is_array($_POST['gate'])) {

    insertOrUpdateGate($_POST['gate']);
    redirect();
}

if (isset($_GET['add']) && $_GET['add'] == '1') {

    $template = 'admin/gates_add.tpl';
}
elseif (isset($_GET['edit'])) {

    $id = (int) $_GET['edit'];

    if (isset($gates[$id])) {

        $data['gate'] = $gates[$id];
    }
    $template = 'admin/gates_edit.tpl';
}
elseif (isset($_GET['delete'])) {

    $template = 'admin/gates_delete.tpl';
}
else {
    $template = 'admin/gates.tpl';
}

displayAdmin($template, $data);

function insertOrUpdateGate($inputData)
{
    $id = isset($inputData['id']) ? (int) $inputData['id'] : null;

    $data = [
        'name' => $inputData['name'] ? trim($inputData['name']) : null,
        'open' => trim($inputData['open']),
        'close' => trim($inputData['close']),
        'active' => 1,
    ];

    if ($id) {
        $gate = dbGetGate($id);
    }
}