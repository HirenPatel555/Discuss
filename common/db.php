<?php
/**
 * db.php
 *
 * Creates a MySQLi connection ($conn) that the rest of the app can reuse.
 */

/* -------------------------------------------------------------
 * 1. Database credentials
 * ----------------------------------------------------------- */
$host     = "localhost";
$username = "root";
$password = "hiren@123";
$database = "discuss";

/* -------------------------------------------------------------
 * 2. Create the MySQLi connection
 * ----------------------------------------------------------- */
$conn = new mysqli($host, $username, $password, $database);

/* -------------------------------------------------------------
 * 3. Check for connection errors
 * ----------------------------------------------------------- */
if ($conn->connect_error) {
    // Stop script execution and show the error message
    die("❌ Connection failed: " . $conn->connect_error);
}

// ✅ If no error, $conn is ready to use.
