<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/cd21e51899.js" crossorigin="anonymous"></script>
</head>
<body>
  <section>
  <div class="container">
    <img src="gst.jpg" alt="">
    <h4>Welcome Back!</h4>
    <form action="loginbk.php" method="post"class="log-forms forms">
      <div class="inputs">
        <i class="fa-solid fa-user"></i>
        <input type="text" name="username" placeholder="Username" required > 
      

      </div>
      <div class="inputs">
        <i class="fa-solid fa-eye-slash" style="color: #05070b;"></i>
        <input type="password" name="password" placeholder="Password">
        
      </div>
      
      
    
  <div class="terms">
      <p>Don't have account? <a href="signup.php">Sign Up</a></p>
    <button type="submit">Log In</button>
  </div>
</form>
  </div>
  </section>
</body>
</html>