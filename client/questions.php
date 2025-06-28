<!-- questionlist.php -->
<h1 class="text-center mb-3">Questions</h1>

<?php
include('./common/db.php');

if (isset($_GET['c-id'])) {
    $cid   = (int) $_GET['c-id'];                          // ★ cast to int (safety)
    $query = "SELECT id, title
              FROM questions
              WHERE category_id = $cid
              ORDER BY id DESC";                           // ★ include ORDER BY
} else {
    $query = "SELECT id, title
              FROM questions
              ORDER BY id DESC";
}

$result = $conn->query($query); 

echo '<div class="list-group shadow-sm">';

    foreach ($result as $row) {
        $id    = (int) $row['id'];
        $title = htmlspecialchars($row['title'], ENT_QUOTES);

        echo '<a href="?q-id=' . $id . '" 
                 class="mb-2 border border-1 border-secondary rounded
                        list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                 <span class="fw-semibold">' . $title . '</span>
                 <i class="bi bi-chevron-right"></i>
              </a>';
    }

    echo '</div>';

