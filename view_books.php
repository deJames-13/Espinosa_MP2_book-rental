<?php 
require_once('./scripts/config.php');
openConnection();

$rented_books = selectAllFrom("rentals");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rented Books</title>
    
    <?php include_once("./style.php") ?>

</head>
<body>
    <?php 
    require_once("./components/header.php");

    ?>
    
    <div class="container-fluid pt-5 px-3">
        <h1>List of Rented Books</h1>
    </div>
    <div class="cotainer-fluid px-5">
        <hr>
        <table class="table table-striped">
            <thead>
                <th scope="col">Rental ID#</th>
                <th scope="col">Book Title</th>
                <th scope="col">Rented By</th>
                <th scope="col">Return Date</th>
                <th scope="col">Total Price</th>
                <th scope="col">Actions</th>
            </thead>
            <tbody>
                <?php foreach ($rented_books as $key => $rented): ?>
                <?php 
                    $rent_id = $rented["id"];
                    $return_date = $rented["return_date"];

                    $username = selectFrom("user", "id", $rented["user_id"])[0]["username"];

                    $book_title = selectFrom("book", "id", $rented["book_id"])[0]["title"];
                    $price_rate = selectFrom("book", "id", $rented["book_id"])[0]["price_rate"];

                    $days = (strtotime($return_date) - strtotime($rented["date"]))/86400;
                    
                    $total = $price_rate * $days;
                ?>
                <tr>
                    <th scope="row"><?php echo $rent_id ?></th>
                    <td><?php echo $book_title ?></td>
                    <td><?php echo $username ?></td>
                    <td><?php echo $return_date ?></td>
                    <td>$<?php echo $total ?></td>
                    <td>
                        <div>
                            
                            <div class="d-flex gap-3">
                                <form action="./update_form.php" method="get">
                                    <input type="hidden" name="id" value="<?php echo $rent_id ?>">
                                    
                                    <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                                </form>
                                <form action="./scripts/book_rent/delete.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $rent_id ?>">

                                    <button type="submit" class="btn btn-outline-danger">
                                    <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>


</body>
</html>