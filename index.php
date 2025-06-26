<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="", initial-scale="1.0">
    <title>Discuss Project</title>
    <?php include('./client/commonFile.php'); ?>
    <link rel="stylesheet" href="./public/style.css">
</head>

<body>
    <?php
    // session_start();
    include('./client/header.php');

    if (isset($_GET['signup']) && !isset($_SESSION['users']['username'])) {
        include('./client/signup.php');
    } else if (isset($_GET['login']) && !isset($_SESSION['users']['username'])) {
        include('./client/login.php');
    } else if (isset($_GET['ask'])) {
        include('./client/ask.php');
    } else if (isset($_GET['q-id'])) {
        $qid = $_GET['q-id'];
        include('./client/question_details.php');
    } else {
        include('client/questions.php');
    }

    ?>

</body>

</html>