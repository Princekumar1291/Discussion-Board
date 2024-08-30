<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign Up</title>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="card">
          <div class="card-header text-center">
            <h3>Sign Up</h3>
          </div>
          <div class="card-body">
            <form action="server/request.php" method="POST">
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