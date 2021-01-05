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

    if(empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $messages[] = ['type' => 'danger', 'message' => 'Bitte gebe eine gültige E-Mail Adresse an!'];
        $executeInput = false;
    }

    if(empty($text)) {
        $messages[] = ['type' => 'danger', 'message' => 'Bitte gebe einen Text ein!'];
        $executeInput = false;
    }

    if($executeInput) {
        $text = nl2br($text);
    }

}