<!-- questionlist.php -->
<h1 class="text-center mb-3">Questions</h1>

<?php
include('./common/db.php');

if (!empty($_GET['c-id'])) {
    $cid = (int) $_GET['c-id'];
    $query = "SELECT id, title FROM questions WHERE category_id = $cid ORDER BY id DESC";
} elseif (!empty($_GET['u-id'])) {
    $uid = (int) $_GET['u-id'];
    $query = "SELECT id, title FROM questions WHERE user_id = $uid ORDER BY id DESC";
} elseif (!empty($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT id, title FROM questions WHERE `title` LIKE '%$search%'";
} else {
    $query = "SELECT id, title FROM questions ORDER BY id DESC";
}


$result = $conn->query($query); 

echo '<div class="list-group shadow-sm">';

    foreach ($result as $row) {
        $id    = (int) $row['id'];
        $title = htmlspecialchars($row['title'], ENT_QUOTES);

        echo '<div class="mb-2 border border-1 border-secondary rounded list-group-item d-flex justify-content-between align-items-start">
        <a href="?q-id=' . $id . '" class="fw-semibold text-decoration-none flex-grow-1 text-secondary fw-bold">' . $title . '</a>' .
        (!empty($uid) ? '<a href="/PHPxampp/Discuss/server/requests.php?delete=' . $id . '" class="btn btn-outline-danger text-decoration-none ms-2">Delete</a>' :NULL) .
      '</div>';
 
    }

    echo '</div>';

