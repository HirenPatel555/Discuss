<div class="container">
    <h4>Answers</h4>

    <?php
    $query="select * from answer where question_id = $qid";
    $result = $conn->query($query);
    foreach ($result as $row) {
        $answer= $row['answer'];
        echo "<div><p>$answer</p></div>";
    }

    ?>
</div>