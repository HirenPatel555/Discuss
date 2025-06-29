<!-- categorylist.php -->
<h1 class="text-center mb-3">Categories</h1>

<?php
// ---------------------------------------------------------------
// 1. Database connection
// ---------------------------------------------------------------
include './common/db.php';

// ---------------------------------------------------------------
// 2. Retrieve all categories, newest first
// ---------------------------------------------------------------
$sql     = "SELECT id, name FROM category ORDER BY id DESC";
$result  = $conn->query($sql);

// ---------------------------------------------------------------
// 3. Render the category list
// ---------------------------------------------------------------
echo '<div class="list-group shadow-sm">';

foreach ($result as $row) {
    // Cast ID to int for safety
    $id = (int) $row['id'];

    // Escape category name to prevent XSS, then capitalize
    $name = htmlspecialchars(ucfirst($row['name']), ENT_QUOTES, 'UTF-8');

    // Output each category as a Bootstrap list‑group item
    echo '
    <a href="?c-id=' . $id . '" 
       class="mb-2 border border-1 border-secondary rounded
              list-group-item list-group-item-action 
              text-decoration-none text-dark fs-5 fw-semibold
              text-center">
        ' . $name . '
    </a>';
}

echo '</div>';
?>