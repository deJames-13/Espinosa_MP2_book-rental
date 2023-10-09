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
    <title><?php $book["title"] ?></title>
    <?php include_once("./style.php") ?>

</head>
<body>
    
    <?php 
    require_once("./components/header.php");
    closeConnection();
    ?>

    <div class="book-info p-5 m-5">
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
                <!-- price_rate per day -->
                <p class="card-text">
                    <strong>
                    $<?php echo $book["price_rate"] ?>
                    </strong>
                </p>
                <div class="d-flex flex-row-reverse gap-3">
            
                    <form action="./rent_form.php" method="get">
                        <input type="hidden" name="id" value="<?php echo $book["id"] ?>">
                        <button type="submit" class="btn btn-success">Rent</button>
                    </form>
                                            


                </div>
            </div>

        </div>
    </div>
    <?php 
    endif
    ?>
</body>
</html>