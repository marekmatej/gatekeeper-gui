<?php

require '../../_functions/_init.php';
require '../../_functions/_admin.php';

global $adminRoot;

$users = dbGetUsers();

$data = [
    'active' => 'users',
    'users' => $users,
];

if (isset($_GET['add']) && $_GET['add'] == '1') {

    if (isset($_POST['user'])) {

        $insertData = [
            'name' => $_POST['user']['name'],
            'pin' => $_POST['user']['pin'],
            'active' => $_POST['user']['active'],
        ];

        dbInsertUser($insertData);
        redirect($adminRoot . 'users/');
    }

    $template = 'admin/user/users_add.tpl';
}
elseif (isset($_GET['edit'])) {

    $id = (int) $_GET['edit'];

    if (isset($users[$id])) {

        if (isset($_POST['user'])) {

            $updateData = [
                'name' => $_POST['user']['name'],
                'pin' => $_POST['user']['pin'],
                'active' => $_POST['user']['active'],
            ];

            dbUpdateUser($id, $updateData);
            redirect($adminRoot . 'users/');
        }

        $data['user'] = $users[$id];
    }

    $template = 'admin/user/users_edit.tpl';
}
elseif (isset($_GET['delete'])) {

    $id = (int) $_GET['delete'];

    if (isset($users[$id])) {

        if (isset($_POST['item'])) {

            if (isset($_POST['item']['really']) && $_POST['item']['really'] == '1') {

                dbDeleteUser($id);
            }

            redirect($adminRoot . 'users/');
        }

        $data['item'] = $users[$id];
    }

    $template = 'admin/user/users_delete.tpl';
}
else {

    $template = 'admin/user/users.tpl';
}

displayAdmin($template, $data);