<?php

require '../_functions/_init.php';

if (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);
}

global $adminRoot;

redirect($adminRoot);
