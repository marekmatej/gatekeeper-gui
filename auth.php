<?php

require '_init.php';

if (isset($_POST['pin'])) {

    $pin = $_POST['pin'];

    $user = dbAuthorizeUser($pin);

    if ($user) {

        $_SESSION['auth_time'] = time();
        $_SESSION['user'] = $user;
        $response['auth'] = true;
    } else {
        $response['auth'] = false;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

redirectToHome();
