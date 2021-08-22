<?php

function setDefaultData($data = [])
{
    global $brand;
    global $wwwRoot;
    global $adminRoot;

    $data['wwwRoot'] = $wwwRoot;
    $data['adminRoot'] = $adminRoot;
    $data['brand'] = $brand;
    $data['requestUri'] = $_SERVER['REQUEST_URI'];
    $data['flashData'] = getFlashData();

    return $data;
}

function displayFront($template, $data = [])
{
    global $smarty;

    $data = setDefaultData($data);

    if (isset($_SESSION['user'])) {
        $data['loggedUser'] = $_SESSION['user'];
    }

    $smarty->assign($data);
    $smarty->display($template);
}

function displayAdmin($template, $data = [])
{
    global $smarty;

    $data = setDefaultData($data);

    if (isset($_SESSION['admin'])) {
        $data['loggedAdmin'] = $_SESSION['admin'];
    }

    if (IS_AJAX) {
        $data['extends'] = 'admin/modal_response.tpl';
    } else {
        $data['extends'] = 'admin/layout.tpl';
    }

    $smarty->assign($data);
    $smarty->display($template);
}

function redirect($url = '')
{
    if (!$url) {
        $url = $_SERVER['REQUEST_URI'];
    }

    header("Location: $url");
    exit;
}

function redirectToHome()
{
    global $wwwRoot;

    redirect($wwwRoot);
}

function checkUserSession()
{
    if (!isset($_SESSION['user'])) {

        return false;
    }

    return true;
}

function loggedUserId()
{
    if (isset($_SESSION['user']['id'])) {
        return $_SESSION['user']['id'];
    }

    return null;
}

function addFlashData($message, $type)
{
    $_SESSION['flashData'][] = array(
        'message' => $message,
        'type' => $type,
    );
}

function getFlashData()
{
    $flashData = [];
    if (isset($_SESSION['flashData'])) {

        $flashData = $_SESSION['flashData'];
        unset($_SESSION['flashData']);
    }

    return $flashData;
}