<?php
session_start();
include('../common/db.php');

// ================================================================
// 1. SIGNUP
// ================================================================
if (isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $address  = $_POST['address'];

    // ✅ Security: Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // ✅ Prepared statement (avoids SQL injection)
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $hashedPassword, $address);

    if ($stmt->execute()) {
        // ✅ Save user session and redirect
        $_SESSION["users"] = [
            "username" => $username,
            "email"    => $email,
            "user_id"  => $stmt->insert_id
        ];
        header("Location: /PHPxampp/Discuss");
        exit();
    } else {
        echo "❌ New User Not Registered";
    }


// ================================================================
// 2. LOGIN
// ================================================================
} else if (isset($_POST['login'])) {

    $email    = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // ✅ Verify hashed password
        if (password_verify($password, $row['password'])) {
            $_SESSION["users"] = [
                "username" => $row['username'],
                "email"    => $email,
                "user_id"  => $row['id']
            ];
            header("Location: /PHPxampp/Discuss");
            exit();
        }
    }

    echo "❌ Invalid login credentials";


// ================================================================
// 3. LOGOUT
// ================================================================
} else if (isset($_GET['logout'])) {

    session_unset();
    session_destroy();
    header("Location: /PHPxampp/Discuss");
    exit();


// ================================================================
// 4. ASK A QUESTION
// ================================================================
} else if (isset($_POST["ask"])) {

    $title       = $_POST['title'];
    $description = $_POST['description'];
    $category_id = (int) $_POST['category'];
    $user_id     = (int) $_SESSION['users']['user_id'];

    $stmt = $conn->prepare("INSERT INTO questions (title, description, category_id, user_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $title, $description, $category_id, $user_id);

    if ($stmt->execute()) {
        header("Location: /PHPxampp/Discuss");
        exit();
    } else {
        echo "❌ Question not added.";
    }


// ================================================================
// 5. POST AN ANSWER
// ================================================================
} else if (isset($_POST["answer"])) {

    $answer      = $_POST['answer'];
    $question_id = (int) $_POST['question_id'];
    $user_id     = (int) $_SESSION['users']['user_id'];

    $stmt = $conn->prepare("INSERT INTO answer (answer, question_id, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $answer, $question_id, $user_id);

    if ($stmt->execute()) {
        header("Location: /PHPxampp/Discuss?q-id=$question_id");
        exit();
    } else {
        echo "❌ Answer not submitted.";
    }


// ================================================================
// 6. DELETE A QUESTION (by question owner)
// ================================================================
} else if (isset($_GET["delete"])) {

    $qid     = (int) $_GET['delete'];
    $user_id = (int) $_SESSION['users']['user_id'];

    // ✅ Make sure the logged-in user owns the question
    $check = $conn->prepare("SELECT id FROM questions WHERE id = ? AND user_id = ?");
    $check->bind_param("ii", $qid, $user_id);
    $check->execute();
    $checkResult = $check->get_result();

    if ($checkResult->num_rows === 1) {
        // Proceed with deletion
        $stmt = $conn->prepare("DELETE FROM questions WHERE id = ?");
        $stmt->bind_param("i", $qid);

        if ($stmt->execute()) {
            header("Location: /PHPxampp/Discuss");
            exit();
        } else {
            echo "❌ Question not deleted.";
        }
    } else {
        echo "❌ Unauthorized to delete this question.";
    }

}
