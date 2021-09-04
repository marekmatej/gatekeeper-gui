<?php

if (isset($_POST['admin'])) {

    $postedData = $_POST['admin'];

    if (isset($postedData['login']) && isset($postedData['password'])) {

        dbAuthorizeAdmin($postedData['login'], $postedData['password']);
    }

    redirect();
}