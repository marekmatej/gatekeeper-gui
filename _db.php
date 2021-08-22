<?php

function dbConnect()
{
    global $db;

    $mysqli = new mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    return $mysqli;
}

function dbAuthorizeUser($pin)
{
    global $connection;

    $sql = "SELECT * FROM `users` WHERE `pin` = '$pin' AND `active` = 1";
    $result = $connection->query($sql);

    $row = $result->fetch_assoc();

    $result->free_result();

    if ($row && $row['active'] === '1') {

        dbLog($row['id'], null, 'auth');

        return $row;
    }

    return false;
}

function dbAuthorizeAdmin($login, $password)
{
    global $connection;

//    $password_hash = password_hash($password, PASSWORD_DEFAULT);
//
//    $sql = "UPDATE  `admins` SET `password` = '$password_hash' WHERE `login` = '$login'";
//    $connection->query($sql);

    $sql = "SELECT * FROM `admins` WHERE `login` = '$login'";
    $result = $connection->query($sql);

    $admin = $result->fetch_assoc();

    $result->free_result();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = $admin;
    } else {
        addFlashData('Prihlásenie nebolo úspešné', 'danger');
    }
}

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

    $columns = array_keys($insertData);
    $values = array_values($insertData);

    $columnsString = implode(', ', array_map(function ($item) {
        return '`' . $item . '`';
    }, $columns));

    $valuesString = implode(',', array_map(function ($item) {
        return "'" . $item . "'";
    }, $values));

    $sql = "INSERT INTO `logs` ($columnsString) VALUES ($valuesString)";

    $connection->query($sql);
}