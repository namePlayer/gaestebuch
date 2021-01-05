<?php

$oneTimeTokenInvalid = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['_token']) || ($_POST['_token'] !== $_SESSION['_token'])) {
        $oneTimeTokenInvalid = true;
    }
}

$newToken = bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION['_token'] = $newToken;