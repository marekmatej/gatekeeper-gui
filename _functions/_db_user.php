<?php

function dbGetUsers()
{
    global $connection;

    $ret = [];

    $sql = "SELECT * FROM `users`";

    $result = $connection->query($sql);

    while ($row = $result->fetch_assoc()) {

        $id = $row['id'];
        $ret[$id] = $row;
    }

    $result->free_result();

    return $ret;
}

function dbAuthorizeUser($pin)
{
    global $connection;

    $sql = "SELECT * FROM `users` WHERE `pin` = '$pin' AND `active` = 1";
    $result = $connection->query($sql);

    $row = $result->fetch_assoc();

    $result->free_result();

    if ($row && $row['active'] === '1') {

        return $row;
    }

    return false;
}

function dbInsertUser($insertData)
{
    global $connection;

    $columns = array_map(function($value) { return '`'.$value.'`'; }, array_keys($insertData));
    $values = array_map(function($value) { return "'".$value."'"; }, array_values($insertData));

    $sql = "INSERT INTO `users` (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $values) . ")";
    $connection->query($sql);
}

function dbUpdateUser($id, $updateData)
{
    global $connection;

    $columns = array_map(function($value) { return '`'.$value.'`'; }, array_keys($updateData));
    $values = array_map(function($value) { return "'".$value."'"; }, array_values($updateData));

    $update = [];

    for ($i = 0; $i < count($columns); $i++) {
        $update[] = $columns[$i] . ' = ' .  $values[$i];
    }

    $sql = "UPDATE `users` SET " . implode(', ', $update) . "  WHERE `id` = $id";
    $connection->query($sql);
}

function dbDeleteUser($id)
{
    global $connection;

    $sql = "DELETE FROM `users` WHERE `id` = $id";
    $connection->query($sql);
}