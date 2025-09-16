<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Character encoding -->
    <meta charset="UTF-8">

    <!--
        Responsive‑design meta tag.
        NOTE: the comma after "content" in your original code was a typo;
        it should be “width=device-width, initial-scale=1.0”.
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Discuss Project</title>

    <!--
        Common CSS/JS or PHP setups that every page needs.
        Assumes commonFile.php echoes <link>/<script> tags or sets up
        shared variables.
    -->
    <?php include('./client/commonFile.php'); ?>

    <!-- App‑specific stylesheet -->
    <link rel="stylesheet" href="./public/style.css">
</head>

<body>
<?php
    /*--------------------------------------------------------------
    |  HIGH‑LEVEL PAGE ROUTING
    |  A very lightweight “router” that decides which partial to load
    |  based on query‑string flags.  If none of the special flags are
    |  present, we fall back to the dashboard.
    --------------------------------------------------------------*/

    // Always show the site‑wide header
    include('./client/header.php');

    // ------------------------------------------------------------------
    // 1. AUTH PAGES (only if user is NOT already logged in)
    // ------------------------------------------------------------------
    if (isset($_GET['signup']) && !isset($_SESSION['users']['username'])) {
        // Registration form
        include('./client/signup.php');

    } elseif (isset($_GET['login']) && !isset($_SESSION['users']['username'])) {
        // Login form
        include('./client/login.php');
 
    // ------------------------------------------------------------------
    // 2. ASK‑A‑QUESTION PAGE
    // ------------------------------------------------------------------
    } elseif (isset($_GET['ask'])) {
        include('./client/ask.php');

    // ------------------------------------------------------------------
    // 3. QUESTION DETAILS (single post)
    // ------------------------------------------------------------------
    } elseif (isset($_GET['q-id'])) {
        $qid = (int)$_GET['q-id'];             // cast to int for safety
        include('./client/question_details.php');

    // ------------------------------------------------------------------
    // 4. DASHBOARD FILTERS
    // ------------------------------------------------------------------
    } elseif (isset($_GET['c-id'])) {          // by category
        $cid = (int)$_GET['c-id'];
        include('./client/dashbord.php');

    } elseif (isset($_GET['u-id'])) {          // by user
        $uid = (int)$_GET['u-id'];
        include('./client/dashbord.php');

    } elseif (isset($_GET['search'])) {        // by search query
        $search = $_GET['search'];             // (sanitize when used!)
        include('./client/dashbord.php');

    // ------------------------------------------------------------------
    // 5. DEFAULT: MAIN DASHBOARD (no filter)
    // ------------------------------------------------------------------
    } else {
        include('./client/dashbord.php');
    }
?>
</body>
</html>
