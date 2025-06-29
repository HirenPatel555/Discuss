<!-- dashboard.php -->

<!-- Outer container with vertical spacing -->
<div class="container my-4">

    <!-- Bootstrap row with gutter spacing (gap between columns) -->
    <div class="row g-4"> <!-- g-4 = gap of 1.5rem between columns -->

        <!-- ===== Left Column: Questions ===== -->
        <div class="col-lg-8">
            <?php
            // Includes the list of questions (filtered or all)
            include('questions.php');
            ?>
        </div>

        <!-- ===== Right Column: Categories ===== -->
        <div class="col-lg-4">
            <?php
            // Includes the list of categories as sidebar/filters
            include('categorylist.php');
            ?>
        </div>

    </div> <!-- End of row -->
</div> <!-- End of container -->