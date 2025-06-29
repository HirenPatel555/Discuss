<div class="container">
    <!-- Section Heading -->
    <h4>Answers</h4>

    <?php
    // Query to fetch all answers related to the current question
    $query = "SELECT * FROM answer WHERE question_id = $qid";

    // Run the query using the database connection
    $result = $conn->query($query);

    // Loop through each row (i.e., each answer)
    foreach ($result as $row) {
        // Extract the answer text from the row
        $answer = $row['answer'];

        // Output the answer inside a <p> tag, wrapped in a <div>
        echo "<div class='mb-3 p-2 border rounded bg-light'><p>$answer</p></div>";
    }
    ?>
</div>