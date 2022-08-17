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

require '_db_admin.php';
require '_db_gate.php';
require '_db_log.php';
require '_db_user.php';









