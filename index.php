<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Discuss Project</title>
    <?php include('./client/commonFile.php'); ?>
    <link rel="stylesheet" href="./public/style.css">
</head>

<body>
    <?php
    include('./client/header.php');

    if (isset($_GET['signup'])) {
        include('./client/signup.php');
    } else if (isset($_GET['login'])) {
        include('./client/login.php');
    } else {
        //code... 
    }

    ?>

</body>

</html>