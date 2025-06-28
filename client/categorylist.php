<!-- categorylist.php -->
<h1 class="text-center mb-3">Categories</h1>

<?php
include('./common/db.php');

$result = $conn->query("SELECT id, name FROM category ORDER BY id DESC");

echo '<div class="list-group shadow-sm">';

foreach ($result as $row) {
    $id   = (int) $row['id'];
    $name = htmlspecialchars(ucfirst($row['name']), ENT_QUOTES);

    echo '<a href="?c-id=' . $id . '" 
             class="mb-2 border border-1 border-secondary rounded
                    list-group-item list-group-item-action">
             <span class="fw-semibold">' . $name . '</span>
          </a>';
}

echo '</div>';
?>
