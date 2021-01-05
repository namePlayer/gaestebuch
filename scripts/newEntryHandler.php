<?php

if(isset($_POST['newEntryNameInput'], $_POST['newEntryEmailInput'], $_POST['newEntryTextInput'])) {

    $executeInput = true;
    if($oneTimeTokenInvalid) {
        $messages[] = ['type' => 'danger', 'message' => 'Der Token ist ungültig'];
        $executeInput = false;
    }

}