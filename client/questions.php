<div class="container ">

    <div class="col-8">
        <h1 class="text-center my-4">Questions</h1>

    <?php

    require_once __DIR__ . '/../common/db.php';
    $query = "select * from questions";
    $result = $conn->query($query);

    foreach ($result as $row) {
        $title = $row['title'];
        echo "<div class='question-list border border-1 border-secondary rounded my-2 p-2'><h4><a href='#' class='text-decoration-none text-secondary style='font-size: 18px; '>$title<a></h4></div>";
    }

    ?>
    </div>

</div>