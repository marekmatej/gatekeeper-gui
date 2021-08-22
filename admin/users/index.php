<?php

require '../../_init.php';
require '../../_admin.php';

$users = dbGetUsers();

$data = [
    'active' => 'users',
    'users' => $users,
];

if (isset($_GET['add']) && $_GET['add'] == '1') {

    $template = 'admin/users_add.tpl';
}
elseif (isset($_GET['edit'])) {

    $id = (int) $_GET['edit'];

    if (isset($users[$id])) {

        $data['user'] = $users[$id];
    }

    $template = 'admin/users_edit.tpl';
}
elseif (isset($_GET['delete'])) {

    $template = 'admin/users_delete.tpl';
}
else {

    $template = 'admin/users.tpl';
}

displayAdmin($template, $data);