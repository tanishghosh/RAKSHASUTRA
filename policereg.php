<?php
session_start();

// initializing variables
$id="";
$email="";
$password="";
$name="";
$age="";
$gender="";
$position="";
$area="";
$city="";
$contact="";
$error = array(); 
$_SESSION['success'] = ""; 

// connect to the database
$db = mysqli_connect('localhost:3306', 'root', '', 'police');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $age= mysqli_real_escape_string($db, $_POST['age']);
  $gender= mysqli_real_escape_string($db, $_POST['gender']);
  $position= mysqli_real_escape_string($db, $_POST['position']);
  $area= mysqli_real_escape_string($db, $_POST['area']);
  $city= mysqli_real_escape_string($db, $_POST['city']);
  $contact= mysqli_real_escape_string($db, $_POST['contact']);
    
  $user_check_query = "SELECT * FROM signup WHERE id='$id' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  
    if ($user['id'] === $id) {
        if (count($errors) == 0) {
            //encrypt the password before saving in the database
            $query = "INSERT INTO users (id,email,password,name,age,gender,position,area,city,contact) 
                      VALUES('$id','$email','$password','$name','$age','$gender','$position','$area','$city','$contact')";
            mysqli_query($db, $query);
            $_SESSION['id'] = $id;
            $_SESSION['reg_user'] = "You have registered successfully";
            header('location: design_p.html');
        }
    }

   else if ($user['email'] === $email) {
        if (count($errors) == 0) {
            $password = md5($password_1);//encrypt the password before saving in the database
            $query = "INSERT INTO users (id,email,password,name,age,gender,position,area,city,contact) 
                      VALUES('$id','$email','$password','$name','$age','$gender','$position','$area','$city','$contact')";
            mysqli_query($db, $query);
            $_SESSION['id'] = $id;
            $_SESSION['reg_user'] = "You have registered successfully";
            header('location: design_p.html');
        }
    }
    else

    {
      $err = "You are logged out";
      echo '<script>alert("You are not registered");window.location.href="policelogin.html"</script>';
    }
  }


  

    ?>

