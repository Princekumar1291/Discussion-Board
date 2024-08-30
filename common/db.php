<?php
$host="localhost";
$user="root";
$password="";
$database="discussion_board";
$conn=new PDO("mysql:host=$host;dbname=$database",$user,$password);

if(!$conn){
  die("Connection failed: ");
}