<main>
    
    <?php 
        $query = "SELECT DISTINCT genre FROM book";
        $genres = executeSelectQuery($query);

        if (isset($_GET['search']) || isset($_GET['genre'])){

            if (!isset($_GET['search'])) {
                $search = "";
            }
            else {
                $search = $_GET['search'];
            }
            if ($_GET["genre"]==="Genre") {
                $genre = "";
            }
            else {
                $genre = $_GET['genre'];
            }

            $books = executeSelectQuery("SELECT * FROM book WHERE title LIKE \"%$search%\" && genre LIKE \"%$genre%\"; ");

        }
        else {
            $books = selectAllFrom("book");
        }


    ?>
    <div class="hero-content text-center text-black py-5" style="background-image: url('background-image.jpg');">
        <div class="container">
            <h1 class="display-4">Welcome to BookHub</h1>
            <p class="lead">Your Premier Destination for Book Rentals</p>
            <p>Discover a world of literature at your fingertips. Rent books, explore genres, and indulge in your love for reading.</p>
            <form class="d-flex p-1 container-sm" action="" method="get">
                <!-- selection of genre -->
                <select name="genre" class="form-select me-2" aria-label="Default select example" style="max-width: 200px;">
                    <!-- options from group genre fields from database -->
                    <option selected>Genre</option>
                    <?php foreach ($genres as $genre): ?>
                    <option value="<?php echo $genre["genre"] ?>"><?php echo $genre["genre"] ?></option>
                    <?php endforeach ?> 

                </select>
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
    </div>

 
    <div class="container-fluid px-5">
        <hr>
        <br>
        <div class="row row-cols-auto gap-4 px-5 mb-5">
            <?php foreach ($books as $book): ?>
            <div class="col">
                <?php include("./components/book.php") ?>
            </div>
            <?php endforeach ?>
        </div>

    </div>

</main>