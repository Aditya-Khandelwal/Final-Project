<?php
  session_start();
  include("db.php");

  if($_SERVER['REQUEST_METHOD']== 'POST')
  {
    $First_name=$_POST['first_name'];
    $Last_name=$_POST['last_name'];
    $Email=$_POST['email'];
    $Phone_number=$_POST['phone'];
    $Password=$_POST['password'];

    if(!empty($Email)&& !empty($Password)&& !is_numeric($Email))
    {
      $query="insert into signup(Fname,Lname,Email,phone,password)values('$First_name','$Last_name','$Email','$Phone_number','$Password') ";
      mysqli_query($con,$query);
      echo "<script type='text/javascript'>alert('Successfully Register')</script";
      header("Location: login.php");
      die(); 
    }
    else
    {
      echo "<script type='text/javascript'>alert('Please Enter Some valid Information')</script";
    }
  }



 ?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="signup.css">
    <title>Sign Up</title>
    <link rel="icon" href=" logo2.png" type="image/x-icon">
</head>
<body>
  <video id="background-video" autoplay loop muted>
    <source src="video2.mp4" type="video/mp4">
  </video>
  <form class="modal-content animate"  method="POST">
    <div class="imgcontainer">
      <span onclick="history.back()" class="close" title="Back to Homepage">&times;</span>
      <img src="logo1.jpg" alt="logo1" class="logo1">
    </div>

    <div class="container">
      <label for="first_name">First Name</label>
      <input type="text" placeholder="Enter First Name" name="first_name" required>

      <label for="last_name">Last Name</label>
      <input type="text" placeholder="Enter Last Name" name="last_name" required>

      <label for="email">Email</label>
      <input type="email" placeholder="Enter Email" name="email" required>

      <label for="phone">Phone Number</label>
      <input type="tel" placeholder="Enter Phone Number" name="phone" required maxlength="10">

      <label for="password">Password</label>
      <input type="password" placeholder="Enter Password" name="password" required>
      
      
  <div class="button-container">
    <button class="submit" type="submit">Sign Up</button>
  </div>
      <div class="login-link">
        <span>Already have an account? <br><a href="login.php" class="login">Login here</a></span>
      </div>
    </div>
  </form>
</body>
</html>
