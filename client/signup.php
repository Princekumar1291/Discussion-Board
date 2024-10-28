<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign Up</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <?php
  include("common/db.php");
  if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    // Check if user exists
    $checkSql = "SELECT * FROM users WHERE email = :email";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bindParam(':email', $email);
    $checkStmt->execute();
    
    if($checkStmt->rowCount() > 0) {
      // User exists - show popup
      echo "<script>
        Swal.fire({
          title: 'Account Exists',
          text: 'An account with this email already exists. Please login instead.',
          icon: 'info',
          confirmButtonText: 'Login'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = '?login=true';
          }
        });
      </script>";
    } else {
      // New user - create account and log them in
      $insertSql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
      $stmt = $conn->prepare($insertSql);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':password', $password);
      
      if($stmt->execute()) {
        // Get the new user's ID
        $userId = $conn->lastInsertId();
        
        // Set user data in session (session already started in db.php)
        $_SESSION['user'] = [
          'id' => $userId,
          'name' => $name,
          'email' => $email
        ];
        
        // Redirect to home page
        echo "<script>
          Swal.fire({
            title: 'Success!',
            text: 'Account created successfully. You are now logged in.',
            icon: 'success',
            confirmButtonText: 'Continue'
          }).then((result) => {
            window.location.href = 'index.php';
          });
        </script>";
      }
    }
  }
  ?>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="card">
          <div class="card-header text-center">
            <h3>Sign Up</h3>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
              </div>
            </form>
          </div>
          <div class="card-footer text-center">
            <p>Already have an account? <a href="?login=true">Log In</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>