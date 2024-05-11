<?php
    session_start();
    include("db.php");
  
    if($_SERVER['REQUEST_METHOD']== 'POST')
  {
      $Email=$_POST['email'];
      $Password=$_POST['password'];
    
    if(!empty($Email)&& !empty($Password)&& !is_numeric($Email))
    {
      $query = "SELECT * FROM signup WHERE email = '$Email' LIMIT 1";
      $result = mysqli_query($con, $query);
      
      if ($result) {
          if (mysqli_num_rows($result) > 0) {
              $user_data = mysqli_fetch_assoc($result);
              if ($user_data['password'] == $Password) {
                  header("location:alog.html");
                  exit;
              } else {
                  echo "<script type='text/javascript'>alert('Wrong username or password')</script>";
              }
          } else {
              echo "<script type='text/javascript'>alert('User not found')</script>";
          }
      } else {
          echo "<script type='text/javascript'>alert('Database query failed')</script>";
      }
    }
  }    
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
    <link rel="icon" href=" logo2.png" type="image/x-icon">
</head>
<body>
  <video id="background-video" autoplay loop muted >
    <source src="video2.mp4" type="video/mp4">
  </video> 
        <form class="modal-content animate"  method="POST">
            <div class="imgcontainer">
              <span onclick="history.back()" class="close" title="Back to Homepage">&times;</span>
              <img src="logo1.jpg" alt="logo1" class="logo1">
            </div>
        
            <div class="container">
              <label for="uname">Email</label>
              <input type="text" placeholder="Enter Username" name="email" required>
        
              <label for="psw">Password</label>
              <input type="password" placeholder="Enter Password" name="password" required>
            
              <button class="submit" type="submit">Login</button>
              <div class="signup-link">
                <span>Don't have an account? <a href="signup.php" class="signup"><br>Sign Up</a></span>
              </div>
              <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
              </label>
            </div>
            <div class="container" style="background-color: #c19d67">
                <span class="psw"><a href="#">Forgot password?</a></span>
            </div>
        </form>
</body>
</html>