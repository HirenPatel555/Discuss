<?php session_start(); ?>

<!-- Bootstrap Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid mx-5"> <!-- Horizontal padding -->

    <!-- Brand/logo -->
    <a class="navbar-brand" href="./">DISCUSS</a>

    <!-- Mobile toggle button (for collapsing nav on smaller screens) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarNav">

      <!-- Left-aligned nav items -->
      <ul class="navbar-nav">
        <!-- Home Link -->
        <li class="nav-item">
          <a class="nav-link active text-secondary fs-5 fw-bold" href="./">Home</a>
        </li>

        <!-- If user is logged in -->
        <?php if (isset($_SESSION['users']['username'])): ?>

          <!-- Logout (displays username) -->
          <li class="nav-item">
            <a class="nav-link text-secondary fs-5 fw-bold"
               href="/PHPxampp/Discuss/server/requests.php?logout=true">
               Logout (<?= ucfirst($_SESSION['users']['username']) ?>)
            </a>
          </li>
          <!-- Ask a Question link -->
          <li class="nav-item">
            <a class="nav-link text-secondary fs-5 fw-bold" href="?ask=true">Ask A Question</a>
          </li>

          <!-- Link to view user's questions -->
          <li class="nav-item">
            <a class="nav-link text-secondary fs-5 fw-bold"
               href="?u-id=<?= $_SESSION['users']['user_id']; ?>">
               My Questions
            </a>
          </li>

        <!-- If user is NOT logged in -->
        <?php else: ?>
          <!-- Login link -->
          <li class="nav-item">
            <a class="nav-link text-secondary fs-5 fw-bold" href="?login=true">Login</a>
          </li>

          <!-- Signup link -->
          <li class="nav-item">
            <a class="nav-link text-secondary fs-5 fw-bold" href="?signup=true">SignUp</a>
          </li>
        <?php endif; ?>
      </ul>

    </div> <!-- End navbar-collapse -->

    <!-- Right-aligned search form -->
    <form class="d-flex" action="">
      <input class="form-control me-2" name="search" type="search" placeholder="Search Questions">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

  </div> <!-- End container -->
</nav>
