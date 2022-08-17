<?php

function dbGetGates($activeOnly = false)
{
    global $connection;

    $ret = [];

    $sql = "SELECT * FROM `gates`";

    if ($activeOnly) {
        $sql .= " WHERE `active` = 1";
    }

    $result = $connection->query($sql);

    while ($row = $result->fetch_assoc()) {

        $id = $row['id'];
        $ret[$id] = $row;
    }

    $result->free_result();

    return $ret;
}

function dbInsertGate($insertData)
{
    global $connection;

    $columns = array_map(function($value) { return '`'.$value.'`'; }, array_keys($insertData));
    $values = array_map(function($value) { return "'".$value."'"; }, array_values($insertData));

    $sql = "INSERT INTO `gates` (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $values) . ")";
    $connection->query($sql);
}

function dbUpdateGate($id, $updateData)
{
    global $connection;

    $columns = array_map(function($value) { return '`'.$value.'`'; }, array_keys($updateData));
    $values = array_map(function($value) { return "'".$value."'"; }, array_values($updateData));

    $update = [];

    for ($i = 0; $i < count($columns); $i++) {
        $update[] = $columns[$i] . ' = ' .  $values[$i];
    }

    $sql = "UPDATE `gates` SET " . implode(', ', $update) . "  WHERE `id` = $id";
    $connection->query($sql);
}

function dbDeleteGate($id)
{
    global $connection;

    $sql = "DELETE FROM `gates` WHERE `id` = $id";
    $connection->query($sql);
}