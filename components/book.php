<?php 
if (isset($book)):
?>
<div class="book card">
    <div class="card-body d-flex flex-column  justify-content-between">
        <img src="./img/empty.jpg" class="card-img-top" alt="...">
        <hr>
        <h5 class="card-title">
            <?php echo $book["title"] ?>
        </h5>

        <p class="card-text overflow-hidden" style="max-height: 70px;">
            <?php echo $book["description"] ?>
        </p>

        <div class="d-flex flex-row-reverse gap-3">
            
            <form action="./rent_form.php" method="get">
                <input type="hidden" name="id" value="<?php echo $book["id"] ?>">
                <button type="submit" class="btn btn-success">Rent</button>
            </form>
                                    
            <form action="view_book.php" method="get">
                <input type="hidden" name="id" value="<?php echo $book["id"] ?>">
                <button type="submit" class="btn btn-outline-primary">View</button>
            </form>

        </div>
    </div>
</div>

<?php endif; ?>