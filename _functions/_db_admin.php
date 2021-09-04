<?php

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