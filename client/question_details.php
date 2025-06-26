<div class="container">
    <h1 class="text-center my-4">Question</h1>
    <div class="col-8">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/PHPxampp/Discuss/common/db.php';
        $qid = isset($_GET['q-id']) ? (int)$_GET['q-id'] : 0;   // ← ADD THIS LINE
        $query = "SELECT * FROM questions WHERE id = $qid";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        // print_r($row); 
        echo "<h4 class='text-secondary'>Question : " . $row['title'] . "</h4><P>Description : " . $row['description'] . "</p>";
        ?>
        <form action="/PHPxampp/Discuss/server/requests.php" method="post">
            <input type="hidden" name="question_id" value="<?php echo (int)$qid; ?>">

            <textarea name="answer"
                class="form-control my-2 p-2"
                placeholder="Your Answer..."></textarea>

            <button class="btn btn-secondary">Write Your Answer</button>
        </form>

    </div>