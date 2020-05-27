<?php
// header("Content-Type: application/json", true);
session_start();

// initializing variables
$id="";
$name="";
$url="";
$email="";
$lng=NULL;
$lat=NULL;

$error = array(); 
$_SESSION['success'] = ""; 

// connect to the database
$db = mysqli_connect('localhost:3306', 'root', '', 'police');

// REGISTER USER

if(isset($_POST["id"]))
  $id = ($_POST['id']);

if(isset($_POST["name"]))
  $name = ($_POST['name']);

if(isset($_POST["url"]))
  $url = ($_POST['url']);

if(isset($_POST["email"]))
  $email = ($_POST['email']);

  echo($id);
  echo("Working");

  echo('<script>console.log("Consoling")</script>');

  $query = "INSERT INTO Accounts (ID,NAME,URL,EMAIL,LONGITUDE,LATITUDE) VALUES
            ('$id','$name','$url','$email','$lng','$lat')";
  mysqli_query($db, $query);
  $_SESSION['id'] = $id;
  //$_SESSION['reg_user'] = "You have registered successfully";
  header('location: design1.html');  

?>