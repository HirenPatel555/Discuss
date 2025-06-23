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
    session_start();
    include('./client/header.php');

    if (isset($_GET['signup']) && !isset($_SESSION['users']['username']))
    {
        include('./client/signup.php');

    } else if (isset($_GET['login']) && !isset($_SESSION['users']['username']))
    {
        include('./client/login.php');

    } else {
        //code... 
    }

    ?>

</body>

</html>