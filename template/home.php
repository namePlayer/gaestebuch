<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gästebuch</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>

    <div class="container-fluid mt-4">

        <div class="row">
            <div class="col-lg-3">
                <form action="" method="post">
                    <div class="card shadow">
                        <div class="card-header text-center">
                            <b>Neuer Eintrag</b>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="newEntryNameInput" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="newEntryNameInput" name="newEntryNameInput">
                            </div>
                            <div class="mb-3">
                                <label for="newEntryEmailInput" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="newEntryEmailInput" name="newEntryEmailInput">
                            </div>
                            <div class="mb-3">
                                <label for="newEntryTextInput" class="form-label">Text:</label>
                                <textarea id="newEntryTextInput" class="form-control" name="newEntryTextInput"></textarea>
                            </div>
                            <input type="hidden" value="<?= $_SESSION['_token']; ?>" name="_token">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-dark btn-sm float-end">Eintragen</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-9">
                <?php echo $templateBuilder->renderMessages($messages); ?>
                <div class="container">
                    <?php
                        while($row = $stmt->fetch()) {
                            $data = ['username' => $row['name'], 'timestamp' => $row['timestamp'], 'message' => $row['message']];
                            $templateBuilder->render('entry', $data);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>