<!-- questionlist.php -->
<h1 class="text-center mb-3">Questions</h1>

<?php
// ------------------------------------------------------------------
// 1. Include DB connection
// ------------------------------------------------------------------
include('./common/db.php');

// ------------------------------------------------------------------
// 2. Build SQL query based on filter conditions
// ------------------------------------------------------------------

// Track which type of filter is active
$uid = $cid = $search = null;

if (!empty($_GET['c-id'])) {
    // Filter by category ID
    $cid   = (int) $_GET['c-id'];
    $query = "SELECT id, title FROM questions WHERE category_id = $cid ORDER BY id DESC";

} elseif (!empty($_GET['u-id'])) {
    // Filter by user ID
    $uid   = (int) $_GET['u-id'];
    $query = "SELECT id, title FROM questions WHERE user_id = $uid ORDER BY id DESC";

} elseif (!empty($_GET['search'])) {
    // Filter by search term (basic match on title)
    $search = $conn->real_escape_string($_GET['search']); // escape for safety
    $query  = "SELECT id, title FROM questions WHERE title LIKE '%$search%' ORDER BY id DESC";

} else {
    // No filter: show all questions
    $query = "SELECT id, title FROM questions ORDER BY id DESC";
}

// ------------------------------------------------------------------
// 3. Run query and display results
// ------------------------------------------------------------------
$result = $conn->query($query);

echo '<div class="list-group shadow-sm">';

foreach ($result as $row) {
    $id    = (int) $row['id'];
    $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');

    // Start question item
    echo '<div class="mb-2 border border-1 border-secondary rounded list-group-item d-flex justify-content-between align-items-start">';

    // Link to view question
    echo '<a href="?q-id=' . $id . '" class="fw-semibold text-decoration-none flex-grow-1 text-secondary fw-bold">'
         . $title .
         '</a>';

    // Show delete button ONLY for user-owned questions (when filtered by user)
    if ($uid !== null) {
        echo '<a href="/PHPxampp/Discuss/server/requests.php?delete=' . $id . '" 
                class="btn btn-outline-danger text-decoration-none ms-2"
                onclick="return confirm(\'Are you sure you want to delete this question?\')">
                Delete
              </a>';
    }

    echo '</div>';
}

echo '</div>';
?>
