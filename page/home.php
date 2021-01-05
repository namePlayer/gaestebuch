<?php

if(isset($_POST['newEntryNameInput'], $_POST['newEntryEmailInput'], $_POST['newEntryTextInput'])) {

    $name = $_POST['newEntryNameInput'];
    $email = $_POST['newEntryEmailInput'];
    $text = $_POST['newEntryTextInput'];

    $executeInput = true;
    if($oneTimeTokenInvalid) {
        $messages[] = ['type' => 'danger', 'message' => 'Der Token ist ungültig'];
        $executeInput = false;
    }

    if(empty($name)) {
        $messages[] = ['type' => 'danger', 'message' => 'Bitte gebe einen Namen an!'];
        $executeInput = false;
    }

    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $messages[] = ['type' => 'danger', 'message' => 'Bitte gebe eine gültige E-Mail Adresse an!'];
        $executeInput = false;
    }

    if(empty($text)) {
        $messages[] = ['type' => 'danger', 'message' => 'Bitte gebe einen Text ein!'];
        $executeInput = false;
    }

    if($executeInput) {
        $text = htmlspecialchars(nl2br($text), ENT_QUOTES, 'UTF-8');
        $text = str_replace('&lt;br /&gt;', '<br />', $text);

        $currentTime = time();

        $stmt = $dbConnection->prepare('INSERT INTO `Entry` SET `name` = :name, `email` = :email, `message` = :msg, `timestamp` = :curtime');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':msg', $text);
        $stmt->bindParam(':curtime', $currentTime);

        if($stmt->execute()) {
            $executeInput = false;
            $messages[] = ['type' => 'success', 'message' => 'Der Eintrag wurde erfolgreich angelegt!'];
        }

        if($executeInput == true) {
            $messages[] = ['type' => 'danger', 'message' => 'Es ist ein Fehler aufgetreten!'];
            $executeInput = false;
        }
    }

}

$stmt = $dbConnection->prepare("SELECT `name`, `email`, `timestamp`, `message` FROM `Entry` WHERE `show` = 'TRUE' ORDER BY `timestamp` DESC");
$stmt->execute();

require_once __DIR__.'/../template/home.php';