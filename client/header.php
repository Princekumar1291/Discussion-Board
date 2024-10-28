<nav class="navbar navbar-expand-sm navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="public/pngwing.com.png" alt="" width="30">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <?php
        if (isset($_SESSION['user']['name'])) {
          echo '<li class="nav-item">
            <a class="nav-link" href="server/request.php?logout=true">Logout</a>
          </li>';
          echo '<li class="nav-item">
            <a class="nav-link" href="?ask=true">Ask Question</a>
          </li>';
        } else {
          echo '<li class="nav-item">
          <a class="nav-link" href="?login=true">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?signup=true">SignUp</a>
          </li>
          ';
        }
        ?>

        <li class="nav-item">
          <a class="nav-link" href="#">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?latest-question=true">Latest Question</a>
        </li>
        <li class="nav-item">
          <?php if(isset($_SESSION['user']['id'])): ?>
          <a class="nav-link" href="?my-question=<?php echo $_SESSION['user']['id']; ?>">My Question</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>
</nav>