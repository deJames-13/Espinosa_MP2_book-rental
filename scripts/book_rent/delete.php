<?php

require_once("../config.php");
openConnection();

$id = $_POST["id"];
$rented = selectAllFromWhere("rentals", "id", $id)[0];

$result = executeDeleteQuery("rentals", "id", $id);

?>
<?php if (1):?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Success</title>
        <?php include_once("../../style.php") ?>
    </head>
    <body>
    <div class="text-center text-danger py-5" style="background-image: url('background-image.jpg');">
        <div class="container">
            <h1 class="display-4">Deleted Successfully!</h1>
            <a href="../../view_books.php" class="btn btn-success mt-5">Go Back</a>
        </div>
    </div>
    </body>
    </html>
<?php endif ?>
