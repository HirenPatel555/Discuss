<?php

session_start();

include('../common/db.php');


if (isset($_POST['signup'])) {
    // echo "User name is ".$_POST['username']."<br/>";
    // echo "User email is ".$_POST['email']."<br/>"; 
    // echo "User password is ".$_POST['password']."<br/>";
    // echo "User address is ".$_POST['address']."<br/>";

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $user = $conn->prepare("Insert into `users`
    (`id`, `username`, `email`, `password`, `address`)
    values(NULL, '$username', '$email', '$password', '$address')
    ");

    $result = $user->execute();

    if ($result) {
        // echo "New User Registered";

        $_SESSION["users"] = [
            "username" => $username,
            "email" => $email,
            "user_id" => $user_id->insert_id
        ];
        header("Location: /PHPxampp/Discuss");
        exit();
    } else {
        echo "New User Not Registered";
    }
} else if (isset($_POST['login'])) {
    // print_r($_POST);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = "";
    $user_id = 0;
    $query = "select * from users where email='$email' and password='$password'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {

        foreach ($result as $row) {
            // print_r($row);
            $username = $row['username'];
            $user_id = $row['id'];
        }
        $_SESSION["users"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
        header("Location: /PHPxampp/Discuss");
        exit();
    } else {
        echo "New User Not Registered";
    }
} else if (isset($_GET['logout'])) {
    session_unset();
    header("Location: /PHPxampp/Discuss");
    exit();
} else if (isset($_POST["ask"])) {
    // print_r($_POST);

    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $user_id = (int)$_SESSION['users']['user_id'];

    $question = $conn->prepare("Insert into `questions`
    (`id`, `title`, `description`, `category_id`, `user_id`)
    values(NULL, '$title', '$description', '$category_id', '$user_id')
    ");

    $result = $question->execute();
    $question->insert_id;

    if ($result) {
        header("Location: /PHPxampp/Discuss");
        exit();
    } else {
        echo "Question not add to Website ";
    }
} else if (isset($_POST["answer"])) {
    // print_r(value: $_POST);
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = (int)$_SESSION['users']['user_id'];

    $query = $conn->prepare("Insert into `answer`
    (`id`, `answer`, `question_id`, `user_id`)
    values(NULL, '$answer', '$question_id', '$user_id')
    ");

    $result = $query->execute();
    $conn->insert_id;
    if ($result) {
        header("Location: /PHPxampp/Discuss?q-id=$question_id");
        exit();
    } else {
        echo "Answer Not Submitted ";
    }
} elseif (isset($_GET["delete"])){
    $qid = $_GET['delete'];
    $query = $conn->prepare("DELETE FROM `questions` WHERE id = $qid");
    $result = $query->execute();
    if($result) {
        header("Location: /PHPxampp/Discuss");
        exit();
    } else {
        echo "Question Not Deleted";
    }
}
