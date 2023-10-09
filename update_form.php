<?php 
require_once('./scripts/config.php');
openConnection();

if (!isset($_GET["id"])) {
    header("Location: ./index.php");
    return;
}

$rented = selectFrom("rentals", "id", $_GET["id"])[0];
$book = selectFrom("book", "id", $rented["book_id"])[0];
$user = selectFrom("user", "id", $rented["user_id"])[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>

    <?php  require_once("./style.php") ?>

</head>
<body>
    <?php
        require_once("./components/header.php");
        closeConnection();
    ?>

    <div class="container-fluid p-5">

        <div class="form">
            <form action="./scripts/book_rent/update.php" method="post" class="mt-5 px-5">
            <h3> Update information. </h1>
            
                <input type="hidden" name="user_id" 
                value="<?php echo $user['id'] ?>">
                <input type="hidden" name="rent_id" 
                value="<?php echo $rented['id'] ?>">


                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input required type="text" class="form-control" id="username" name="username" 
                    value="<?php echo $user['username'] ?>"/>

                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input required type="text" class="form-control" id="name" name="name" 
                    value="<?php echo $user['name'] ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input required type="text" class="form-control" id="email" name="email" 
                    value="<?php echo $user['email'] ?>">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea required class="form-control" id="address" name="address" rows="3" 
                    value="<?php echo $user['address'] ?>"><?php echo $user['address'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="book_id" class="form-label">Book ID</label>
                    <input required type="text" class="form-control" id="book_id" name="book_id" 
                    value="<?php echo $book["id"] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="rent_date" class="form-label">Rent Date</label>
                    <input required type="date" class="form-control" id="rent_date" name="rent_date" 
                    value="<?php echo $rented['date'] ?>">
                </div>
                <div class="mb-3">
                    <label for="return_date" class="form-label">Return Date</label>
                    <input required type="date" class="form-control" id="return_date" name="return_date" value="<?php echo $rented['return_date'] ?>">
                </div>
                <div class="mb-3">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input required type="date" class="form-control" id="due_date" name="due_date" value="<?php echo $rented['due_date'] ?>">
                </div>
                <div class="mb-3">
                    <label for="total_price" class="form-label">Cost</label>
                    <input required type="text" class="form-control" id="total_price" name="total_price" value="<?php echo $book["price_rate"] ?>" readonly>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>

</body>
</html>