<?php

require_once("../config.php");
openConnection();

// create user for renting
// fields: username, email, name, address

$username = $_POST["username"];
$email = $_POST["email"];
$name = $_POST["name"];
$address = $_POST["address"];

$date = $_POST["rent_date"];
$return_date = $_POST["return_date"];
$status = "ongoing";


$query = "INSERT INTO user(`username`, `email`, `name`, `address`) VALUES (\"$username\", \"$email\", \"$name\", \"$address\"); \n";
$result = executeQuery($query);

$lastId = mysqli_insert_id($conn);
$query2 = "INSERT INTO rentals(`book_id`, `user_id`, `date`, `due_date`, `return_date`, `status`) VALUES (\"{$_POST['book_id']}\", \"$lastId\", \"$date\", NOW() + INTERVAL 7 day, \"$return_date\", \"$status\"); ";

$result = executeQuery($query2);

?>

<?php if ($result):?>
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
            <h1 class="display-4">Book Rented Successfully!</h1>
            <a href="../../index.php" class="btn btn-success mt-5">Go Back</a>
        </div>
    </div>
    </body>
    </html>
<?php endif ?>
