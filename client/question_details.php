<div class="container">
    <div class="row g-4"> <!-- g‑4 = 1.5 rem gap between cols -->

        <!-- =========================================================
             MAIN COLUMN – Question + Answers
        ========================================================== -->
        <div class="col-lg-8">
            <div class="border border-1 border-secondary rounded mt-5 p-2">

                <!-- Page title -->
                <h1 class="border border-1 border-secondary rounded mb-3 py-2 px-2 text-center fs-1">
                    Question
                </h1>

                <?php
                /* ------------------------------------------------------
                 * 1. Fetch the question
                 * ---------------------------------------------------- */
                include $_SERVER['DOCUMENT_ROOT'] . '/PHPxampp/Discuss/common/db.php';
 
                // Get q‑id from URL (0 if missing) and cast to int for safety
                $qid   = isset($_GET['q-id']) ? (int)$_GET['q-id'] : 0;

                // Grab the question row
                $sql   = "SELECT * FROM questions WHERE id = $qid";
                $row   = $conn->query($sql)->fetch_assoc();

                // Exit early if not found
                if (!$row) {
                    echo "<p class='text-danger'>Question not found.</p>";
                    return;
                }

                // Category id for sidebar use
                $cid = (int) $row['category_id'];

                // Display question details (escaped)
                echo "
                    <div class='mb-2 py-2 px-2 border border-1 border-secondary rounded'>
                        <h4 class='text-secondary fs-3'>
                            Question : " . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . "
                        </h4>
                        <p class='fs-5'>
                            Description : " . nl2br(htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8')) . "
                        </p>
                    </div>";
                ?>

                <!-- =================================================
                     Answers list + Answer form
                ================================================== -->
                <div class="mb-2 py-2 px-2 border border-1 border-secondary rounded">

                    <!-- Existing answers -->
                    <?php include __DIR__ . '/answers.php'; ?>

                    <!-- New answer form -->
                    <form action="/PHPxampp/Discuss/server/requests.php" method="POST">
                        <!-- Hidden field lets backend know which question -->
                        <input type="hidden" name="question_id" value="<?= $qid; ?>">

                        <textarea
                            name="answer"
                            class="form-control my-2 p-2 fs-5"
                            placeholder="Your Answer..."
                            required
                        ></textarea>

                        <div class="d-flex justify-content-center">
                            <button class="btn btn-secondary">Write Your Answer</button>
                        </div>
                    </form>
                </div>
            </div> <!-- /.question‑box -->
        </div> <!-- /.col-lg-8 -->

        <!-- =========================================================
             SIDEBAR – Category name + other questions in same category
        ========================================================== -->
        <div class="col-lg-4">
            <div class="border border-1 border-secondary rounded mt-5 p-2">
                <?php
                /* ------------------------------------------------------
                 * 2. Fetch category name
                 * ---------------------------------------------------- */
                $catSql   = "SELECT name FROM category WHERE id = $cid";
                $catRow   = $conn->query($catSql)->fetch_assoc();
                $catName  = $catRow ? ucfirst(htmlspecialchars($catRow['name'], ENT_QUOTES, 'UTF-8')) : 'Unknown';

                // Category title
                echo "<h4 class='border border-1 border-secondary rounded mb-3 py-2 px-2 text-center fs-2'>
                        $catName
                      </h4>";

                /* ------------------------------------------------------
                 * 3. Other questions in same category, excluding current
                 * ---------------------------------------------------- */
                $otherSql = "SELECT id, title
                             FROM questions
                             WHERE category_id = $cid AND id <> $qid
                             ORDER BY id DESC";

                foreach ($conn->query($otherSql) as $q) {
                    $id    = (int) $q['id'];
                    $title = htmlspecialchars($q['title'], ENT_QUOTES, 'UTF-8');

                    echo "
                      <div class='mb-2 py-2 px-2 border border-1 border-secondary rounded'>
                          <h5 class='mb-1'>
                              <a href='?q-id=$id' class='text-decoration-none text-dark fs-5'>
                                  $title
                              </a>
                          </h5>
                      </div>";
                }
                ?>
            </div> <!-- /.sidebar‑box -->
        </div> <!-- /.col-lg-4 -->

    </div> <!-- /.row -->
</div> <!-- /.container -->
