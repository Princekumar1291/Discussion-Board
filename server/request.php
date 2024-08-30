<?php
session_start();
include("../common/db.php");
if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $sql = "INSERT INTO users(name, email, password) VALUES(:name, :email, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);
  
  $result = $stmt->execute();
  
  if ($result) {
      $userId = $conn->lastInsertId();  // Get the last inserted ID
      $_SESSION['user'] = [
          'name' => $name,
          'email' => $email,
          'password' => $password,
          'id' => $userId
      ];
      echo "Data inserted successfully";
      print_r($_SESSION['user']);
      header("location:../index.php");
  } else {
      echo "Data not inserted";
  }
}

else if(isset($_POST['login'])){
  $sql="SELECT * FROM users WHERE email=:email AND password=:password";
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':email',$_POST['email']);
  $stmt->bindParam(':password',$_POST['password']);
  $stmt->execute();
  $user=$stmt->fetch();
  if($user){
    $_SESSION['user']=['name'=>$user['name'] ,'email'=>$user['email'], 'password'=>$user['password']];
    header("location:../index.php");
    print_r($user);
  }
  else{
    echo "Invalid email or password";
  }
}
else if(isset($_GET['logout'])){
  unset($_SESSION['user']);
  header("location:../index.php");
}
else if(isset($_POST['ask']) && isset($_SESSION['user']['name'])){
  // print_r($_POST);
  $title=$_POST['title'];
  $description=$_POST['description'];
  $category=$_POST['category'];
  $categoryIdSql="SELECT id FROM category WHERE name=:category";
  $categoryId=$conn->prepare($categoryIdSql);
  $categoryId->bindParam(':category',$category);
  $categoryId->execute();
  $categoryId=$categoryId->fetch();
  $categoryId=$categoryId['id'];
  $sql="INSERT INTO questions(title,description,userId,categoryId) VALUES(:title,:description,:userId,:categoryId)";
  $userSubmit=$conn->prepare($sql);
  $userSubmit->bindParam(':title',$title);
  $userSubmit->bindParam(':description',$description);
  $userSubmit->bindParam(':userId',$_SESSION['user']['id']);
  $userSubmit->bindParam(':categoryId',$categoryId);
  $userSubmit->execute();
  if ($userSubmit) {
    echo "<script>alert('Question submitted successfully'); window.location.href = '../index.php';</script>";
  } else {
      echo "<script>alert('Data not inserted');</script>";
  }
}
