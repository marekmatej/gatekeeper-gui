<?php

require '_functions/_init.php';

if (isset($_POST['pin'])) {

    $pin = $_POST['pin'];

    $user = dbAuthorizeUser($pin);

    if ($user) {

        $_SESSION['auth_time'] = time();
        $_SESSION['user'] = $user;
        $response['auth'] = true;
        dbLog($user['id'], null, 'login success');
    } else {
        $response['auth'] = false;
        dbLog(null, null, 'login failed');
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

redirectToHome();
