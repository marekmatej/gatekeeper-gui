<?php

function dbGetLogs()
{
    global $connection;

    $ret = [];

    $sql = "SELECT user_id, gate_id, action, date_time, u.name AS user, g.name AS gate FROM `logs` l LEFT JOIN `users` u ON u.id = l.user_id LEFT JOIN `gates` g ON g.id = l.gate_id";

    $result = $connection->query($sql);

    while ($row = $result->fetch_assoc()) {

        $ret[] = $row;
    }

    $result->free_result();

    return $ret;
}

function dbLog($user_id, $gate_id, $action)
{
    global $connection;

    $insertData = [
        'user_id' => $user_id,
        'gate_id' => $gate_id,
        'action' => $action,
        'date_time' => date('Y-m-d H:i:s'),
    ];

    $columns = array_map(function($value) { return '`'.$value.'`'; }, array_keys($insertData));
    $values = array_map(function($value) { return is_null($value) ? 'null' :  "'".$value."'"; }, array_values($insertData));

    $sql = "INSERT INTO `logs` (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $values) . ")";
    $connection->query($sql);
}