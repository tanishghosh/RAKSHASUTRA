<?php
   session_start();
   
   if(session_destroy()) {
         header("Location:mainpage.html");
         $err = "You are logged out";
         echo '<script>alert("You are logged out")</script>';
   }
      else{
        
         echo '<script>alert("")</script>';
      }
?>

