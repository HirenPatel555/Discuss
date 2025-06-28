<div class="container">
    <div class="row g-4">

        <div class="col-8">
            <div class="border border-1 border-secondary rounded mt-5 p-2">

                <h1 class="class='border border-1 border-secondary rounded mb-3 py-2 px-2 text-center fs-1 mb-2 py-2 px-2 border border-1 border-secondary rounded">Question</h1>
                <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/PHPxampp/Discuss/common/db.php';
                $qid = isset($_GET['q-id']) ? (int)$_GET['q-id'] : 0;   // ← ADD THIS LINE
                $query = "SELECT * FROM questions WHERE id = $qid";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $cid = $row['category_id'];

                echo "<div class='mb-2 py-2 px-2 border border-1 border-secondary rounded'><h4 class='text-secondary fs-3'>Question : " . $row['title'] . "</h4><P class='fs-5'>Description : " . $row['description'] . "</p></div>";
                ?>
                <div class="mb-2 py-2 px-2 border border-1 border-secondary rounded">

                    <?php include __DIR__ . '/answers.php'; ?>
                    
                    <form action="/PHPxampp/Discuss/server/requests.php" method="post">
                        <input type="hidden" name="question_id" value="<?php echo (int)$qid; ?>">

                        <textarea name="answer"
                            class="form-control my-2 p-2 fs-5"
                            placeholder="Your Answer..."></textarea>

                        <div class="d-flex justify-content-center">
                            <button class="btn btn-secondary">Write Your Answer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-4">
            <div class="border border-1 border-secondary rounded mt-5 p-2">
                <?php
                $categoryQuery = "SELECT name FROM category WHERE id = $cid";
                $categoryResult = $conn->query($categoryQuery);
                $categoryRow = $categoryResult->fetch_assoc();

                // Add spacing under the category title
                echo "<h4 class='border border-1 border-secondary rounded mb-3 py-2 px-2 text-center fs-2'>" . ucfirst($categoryRow['name']) . "</h4>";

                $query = "SELECT * FROM questions WHERE category_id = $cid AND id != $qid";
                $result = $conn->query($query);

                foreach ($result as $row) {
                    $id = $row['id'];
                    $title = $row['title'];

                    // Add margin and padding for each question link
                    echo "<div class='mb-2 py-2 px-2 border border-1 border-secondary rounded'>
                    <h5 class='mb-1'>
                        <a href='?q-id=$id' class='text-decoration-none text-dark fs-5'>$title</a>
                    </h5>
                  </div>";
                }
                ?>
            </div>
        </div>

    </div>


</div>