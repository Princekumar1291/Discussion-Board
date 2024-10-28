<?php
include("common/db.php");

if(isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);
  $stmt->execute();
  
  if($stmt->rowCount() > 0) {
    $user = $stmt->fetch();
    $_SESSION['user'] = [
      'id' => $user['id'],
      'name' => $user['name'],
      'email' => $user['email']
    ];
    header("Location: index.php");
    exit();
  } else {
    echo "<script>alert('Invalid email or password');</script>";
  }
}
?>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          <h3>Log In</h3>
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary" name="login">Log In</button>
            </div>
          </form>
        </div>
        <div class="card-footer text-center">
          <p>Don't have an account? <a href="?signup=true">Sign Up</a></p>
        </div>
      </div>
    </div>
  </div>
</div>