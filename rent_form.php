<?php 
require_once('./scripts/config.php');
openConnection();

if (!isset($_GET["id"])) {
    header("Location: ./index.php");
    return;
}

$book = selectFrom("book", "id", $_GET["id"])[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent</title>

    <?php  require_once("./style.php") ?>

</head>
<body>
    <?php
        require_once("./components/header.php");
        closeConnection();
    ?>

    <div class="container-fluid p-5">
        <div class="book-info">
        <?php 
        if (isset($book)):
        ?>
        <div class="card">
            <div class="card-body d-flex align-items-center">
                <div class="container-sm-1">
                    <img src="./img/empty.jpg" class="img-thumbnail me-5" alt="..." style="max-width:200px;">
                </div>
                <hr>
                <div class="d-flex flex-column">
                    <h5 class="card-title fs-1">
                        <?php echo $book["title"] ?>
                    </h5>
                    <div class="fs-4">
                        <p class="card-text">
                            <?php echo $book["author"] ?> - 
                            <?php echo $book["year"] ?>
                        </p>
                        <p class="card-text">
                            <?php echo $book["genre"] ?>
                        </p>
                    </div>
                    <p class="card-text overflow-hidden" style="max-height: 75px;">
                        <?php echo $book["description"] ?>
                    </p>
                    <!-- price_rate per hour -->
                    <p class="card-text">
                        <strong>
                        $<?php echo $book["price_rate"] ?>  per day
                        </strong>
                    </p>
                </div>

            </div>
        </div>

        <?php endif; ?>
        </div>
        <div class="form">
            <form action="./scripts/book_rent/create.php" method="post" class="mt-5 px-5">
            <h3> Complete the form to rent the book. </h1>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input required type="text" class="form-control" id="username" name="username" placeholder="john.doe">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input required type="text" class="form-control" id="name" name="name" placeholder="John Doe">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input required type="text" class="form-control" id="email" name="email" placeholder="username@email.com">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea required class="form-control" id="address" name="address" rows="3" placeholder="1234 Main St"></textarea>
                </div>
                <div class="mb-3">
                    <label for="book_id" class="form-label">Book ID</label>
                    <input required type="text" class="form-control" id="book_id" name="book_id" value="<?php echo $book["id"] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="rent_date" class="form-label">Rent Date</label>
                    <input required type="date" class="form-control" id="rent_date" name="rent_date" value="<?php echo date("Y-m-d") ?>">
                </div>
                <div class="mb-3">
                    <label for="return_date" class="form-label">Return Date</label>
                    <input required type="date" class="form-control" id="return_date" name="return_date" value="<?php echo date("Y-m-d", strtotime("+1 day")) ?>">
                </div>
                <div class="mb-3">
                    <label for="total_price" class="form-label">Cost</label>
                    <input required type="text" class="form-control" id="total_price" name="total_price" value="<?php echo $book["price_rate"] ?>" readonly>
                </div>

                <button type="submit" class="btn btn-primary">Rent</button>
            </form>
        </div>
    </div>

</body>
</html>