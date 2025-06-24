<?php session_start(); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="container-fluid">
    <a class="navbar-brand" href="#">DISCUSS</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link active" href="./">Home</a>
        </li>

        <?php if (isset($_SESSION['users']['username'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="/PHPxampp/Discuss/server/requests.php?logout=true">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?ask=true">Ask A Question</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="?login=true">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?signup=true">SignUp</a>
          </li>
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link" href="#">Category</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Latest Questions</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
