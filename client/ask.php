<div class="container">

    <h1 class="text-center mb-4">Ask A Question</h1>

    <form action="/PHPxampp/Discuss/server/requests.php" method="POST">
 
        <div class="col-6 offset-sm-3 mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Question">
        </div>

        <div class="col-6 offset-sm-3 mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" placeholder="Enter Description"></textarea>
        </div>

        <div class="col-6 offset-sm-3 mb-3">
            <label for="category" class="form-label">Category</label>
            <?php
            include('category.php');
            ?>
        </div>

        <div class="col-6 offset-sm-3 mb-3">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>


</div>