<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ask a Question</title>
  <style>
    body {
      background-color: #f4f4f9;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
      max-width: 600px;
    }

    .card {
      border-radius: 10px;
      box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }

    .card-header {
      background-color: #007bff;
      color: white;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      transition: background-color 0.3s, transform 0.3s;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      transform: scale(1.02);
    }

    select.form-control {
      appearance: none;
      background-image: url('public/dropdown.jpeg');
      background-repeat: no-repeat;
      background-position: right 10px center;
      background-size: 20px 20px;
    }

    select.form-control:focus {
      background-image: url('public/dropdown.jpeg');
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div>
        <div class="card">
          <div class="card-header text-center">
            <h3>Ask a Question</h3>
          </div>
          <div class="card-body">
            <form action="server/request.php" method="POST">
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="6" class="form-control" required>Write your question</textarea>
              </div>
              <div class="mb-3 position-relative">
                <label for="category" class="form-label">Category</label>
                  <?php
                  include("catogery.php");
                  ?>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary" name="ask">ASK Question</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
