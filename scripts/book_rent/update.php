<?php

require_once("../config.php");
openConnection();

// create user for renting
// fields: username, email, name, address

$user_id = $_POST["user_id"];
$username = $_POST["username"];
$email = $_POST["email"];
$name = $_POST["name"];
$address = $_POST["address"];

$rent_id = $_POST["rent_id"];
$date = $_POST["rent_date"];
$return_date = $_POST["return_date"];
$status = "ongoing";
$due_date = $_POST["due_date"];


$query = "UPDATE user SET `username`=\"$username\", `email`=\"$email\", `name`=\"$name\", `address`=\"$address\" WHERE `id`=\"$user_id\"; \n";
$result = executeQuery($query);

$lastId = mysqli_insert_id($conn);
$query2 = "UPDATE rentals SET `book_id`=\"{$_POST['book_id']}\", `user_id`=\"$user_id\", `date`=\"$date\", `due_date`=\"$due_date\", `return_date`=\"$return_date\", `status`=\"$status\" WHERE `id`=\"$rent_id\";; ";


$result = executeQuery($query2);

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
    <div class="text-center text-black py-5" style="background-image: url('background-image.jpg');">
        <div class="container">
            <h1 class="display-4">Updated Successfully!</h1>
            <a href="../../view_books.php" class="btn btn-success mt-5">Go Back</a>
        </div>
    </div>
    </body>
    </html>
<?php endif ?>