<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent a Book</title>

    <?php  require_once("./style.php") ?>

</head>
<body>
    <?php
        
        require_once("./scripts/config.php");
        openConnection();
        require_once("./components/header.php");
        require_once("./components/main.php");
        closeConnection();
    ?>

</body>
</html>