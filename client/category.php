<?php
// error_reporting(E_ALL);               // turn on errors while debugging
// ini_set('display_errors', 1);

// connect to DB – path relative to THIS file
require_once dirname(__DIR__) . '/common/db.php';

$sql = "SELECT id, name FROM category";
$result = $conn->query($sql) or die("DB error: " . $conn->error);
?>
<select id="category" name="category" class="form-control">
    <option value="">Select a Category</option>
    <?php while ($row = $result->fetch_assoc()): ?>
        <option value="<?= $row['id']; ?>">
            <?= ucfirst($row['name']); ?>
        </option>
    <?php endwhile; ?>
</select>
