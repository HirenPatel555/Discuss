<?php session_start(); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="container-fluid mx-5">
    <a class="navbar-brand" href="./">DISCUSS</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link active text-secondary fs-5 fw-bold" href="./">Home</a>
        </li>

        <?php if (isset($_SESSION['users']['username'])): ?>
          <li class="nav-item">
            <a class="nav-link text-secondary fs-5 fw-bold" href="/PHPxampp/Discuss/server/requests.php?logout=true">Logout(<?php echo ucfirst($_SESSION['users']['username'])?>)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary fs-5 fw-bold" href="?ask=true">Ask A Question</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary fs-5 fw-bold" href="?u-id=<?php echo $_SESSION['users']['user_id']; ?>">My Questions</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link text-secondary fs-5 fw-bold" href="?login=true">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary fs-5 fw-bold" href="?signup=true">SignUp</a>
          </li>
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link text-secondary fs-5 fw-bold" href="?latest=true">Latest Questions</a>
        </li>
      </ul>
    </div>
    <form class="d-flex" action="">
        <input class="form-control me-2" name="search" type="search" placeholder="Search Questions">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>
</nav>
