<?php
/**
 * category.php
 *
 * Builds the <select> list of categories for the “Ask A Question” form.
 */

// ------------------------------------------------------------------
// 1. Database connection
// ------------------------------------------------------------------
require_once dirname(__DIR__) . '/common/db.php';  // use absolute path

// ------------------------------------------------------------------
// 2. Fetch categories
// ------------------------------------------------------------------
$sql    = "SELECT id, name FROM category";
$result = $conn->query($sql) or die("DB error: " . $conn->error);
?>

<!-- 
    ----------------------------------------------------------------
    3. Render the category <select>
    ---------------------------------------------------------------- 
-->
<select id="category" name="category" class="form-control">
    <!-- Default placeholder option -->
    <option value="">Select a Category</option>

    <!-- Loop through each category record and create an <option> -->
    <?php while ($row = $result->fetch_assoc()): ?>
        <option value="<?= $row['id']; ?>">
            <!-- ucfirst() capitalizes the first letter (e.g. “php” → “Php”)  -->
            <?= ucfirst(htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8')); ?>
        </option>
    <?php endwhile; ?>
</select>
