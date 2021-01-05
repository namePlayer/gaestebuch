<?php
session_start();

require_once __DIR__.'/scripts/database.inc.php';
require_once __DIR__.'/scripts/csrfProtection.php';
require_once __DIR__.'/scripts/TemplateBuilder.php';

$messages = [];
$templateBuilder = new TemplateBuilder();

require_once __DIR__ . '/page/home.php';