<?php

require '../../_functions/_init.php';
require '../../_functions/_admin.php';

global $adminRoot;

$gates = dbGetGates();

$data = [
    'active' => 'gates',
    'gates' => $gates,
];

if (isset($_GET['add']) && $_GET['add'] == '1') {

    if (isset($_POST['gate'])) {

        $insertData = [
            'name' => $_POST['gate']['name'],
            'open' => $_POST['gate']['open'],
            'close' => $_POST['gate']['close'],
            'active' => $_POST['gate']['active'],
        ];

        dbInsertGate($insertData);
        redirect($adminRoot . 'gates/');
    }

    $template = 'admin/gate/gates_add.tpl';
}
elseif (isset($_GET['edit'])) {

    $id = (int) $_GET['edit'];

    if (isset($gates[$id])) {

        if (isset($_POST['gate'])) {

            $updateData = [
                'name' => $_POST['gate']['name'],
                'open' => $_POST['gate']['open'],
                'close' => $_POST['gate']['close'],
                'active' => $_POST['gate']['active'],
            ];

            dbUpdateGate($id, $updateData);
            redirect($adminRoot . 'gates/');
        }

        $data['gate'] = $gates[$id];
    }
    $template = 'admin/gate/gates_edit.tpl';
}
elseif (isset($_GET['delete'])) {

    $id = (int) $_GET['delete'];

    if (isset($gates[$id])) {

        if (isset($_POST['item'])) {

            if (isset($_POST['item']['really']) && $_POST['item']['really'] == '1') {

                dbDeleteGate($id);
            }

            redirect($adminRoot . 'gates/');
        }

        $data['item'] = $gates[$id];
    }

    $template = 'admin/gate/gates_delete.tpl';
}
else {
    $template = 'admin/gate/gates.tpl';
}

displayAdmin($template, $data);
