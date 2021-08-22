<?php

require '_init.php';

global $wwwRoot;

if (checkUserSession()) {

    $gates = dbGetGates(true);

    $data = [
        'gates' => $gates,
    ];

    if (isset($_GET['id']) && isset($_GET['a'])) {

        $user_id = loggedUserId();
        $gate_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $action = isset($_GET['a']) ? $_GET['a'] : '';

        if ($user_id && isset($gates[$gate_id]) && in_array($action, ['open', 'close'])) {

            $command = $gates[$gate_id][$action];
            $output = shell_exec($command);

            $data['gates'][$gate_id]['output'] = $output;
            dbLog($user_id, $gate_id, $action);
        }

        redirect($wwwRoot);
    } elseif (isset($_GET['a']) && $_GET['a'] === 'logout') {

        unset($_SESSION['user']);
        redirect($wwwRoot);
    }

    displayFront('front/gates.tpl', $data);
} else {
    displayFront('front/front.tpl');
}

