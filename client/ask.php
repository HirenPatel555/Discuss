<div class="container">

    <!-- Page Heading -->
    <h1 class="text-center mb-4 mt-4">Ask A Question</h1>

    <!-- Form to submit a new question -->
    <form action="/PHPxampp/Discuss/server/requests.php" method="POST">
        <!-- The form submits to 'requests.php' using POST method -->

        <!-- Title input field -->
        <div class="col-6 offset-sm-3 mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Question" required>
        </div>

        <!-- Description textarea field -->
        <div class="col-6 offset-sm-3 mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" placeholder="Enter Description" required></textarea>
        </div>

        <!-- Category dropdown or input (loaded from separate PHP file) -->
        <div class="col-6 offset-sm-3 mb-3">
            <label for="category" class="form-label">Category</label>
            <?php
            // Includes the category select input (e.g. <select> element)
            // __DIR__ gives absolute path of current file's directory
            include __DIR__ . '/category.php';
            ?>
        </div>

        <!-- Submit button -->
        <div class="col-6 offset-sm-3 mb-3 text-center">
            <button type="submit" name="ask" class="btn btn-secondary">Ask Question</button>
        </div>
    </form>
</div>