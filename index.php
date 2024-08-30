<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="public/pngwing.com.png" sizes="32x32" type="image/png">
  <title>Discussion Board</title>
  <?php
  include("./client/commonFiles.php")
  ?>
</head>

<body>
  <?php
  session_start();
  
  include("./client/header.php");
  include("./client/questions.php");

  if(isset($_GET['signup']) && !isset($_SESSION['user']['name'])){
    include("./client/signup.php");
  }
  else if(isset($_GET['login']) && !isset($_SESSION['user']['name'])){
    include("./client/login.php");
  }
  else if(isset($_GET['ask']) && isset($_SESSION['user']['name'])){
    include("./client/ask.php");
  }
  ?>
</body>

</html>