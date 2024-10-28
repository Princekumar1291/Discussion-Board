<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="public/pngwing.com.png" sizes="32x32" type="image/png">
  <title>Discussion Board</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="public/style.css">
</head>

<body>
  <?php
  session_start();
  
  include("./client/header.php");
  
  if(isset($_GET['signup']) && !isset($_SESSION['user']['name'])){
    include("./client/signup.php");
  }
  else if(isset($_GET['login']) && !isset($_SESSION['user']['name'])){
    include("./client/login.php");
  }
  else if(isset($_GET['ask']) && isset($_SESSION['user']['name'])){
    include("./client/ask.php");
  }
  else if(isset($_GET['que-id'])){
    include("./client/questioinDetails.php");
  }
  else if(isset($_GET['category_id'])){
    include("./client/questions.php");
  }
  else if(isset($_GET['my-question'])){
    include("./client/questions.php");
  }
  else if(isset($_GET['latest-question'])){
    include("./client/questions.php");
  }
  else{
    include("./client/questions.php");
  }
  ?>
</body>

</html>