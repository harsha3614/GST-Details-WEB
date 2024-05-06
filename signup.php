<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GST</title>
  <link rel="stylesheet" href="style.css">
  <style>
    button {
    text-decoration: none;
    border: #2D4990;
    border-radius: 10px;
    width: 520px;
    padding: 10px;
    margin-top: 50px;
    margin-bottom: 10px;
    background-color: #2D4990;
    color: #fff;
    cursor: pointer;
  }
  </style>
</head>
<body>
  <div class="container">
    <img src="gst.jpg" alt="">
    <h4>Sign Up</h4>
    <form action="signupbk.php" method="post" class="sign-forms forms">
      <input type="text" name="user_name" placeholder="Username">
      <input type="text" name="mobile_number" placeholder="Mobile Number">
      <input type="email" name="email" placeholder="Email ID">
      <input type="password" name="password" placeholder="Password">
      <input type="password" name="confirm_password" placeholder="Confirm Password">
      <button type="submit">Sign Up</button>
    </form>
    <div class="terms">
      <input type="checkbox" name="" id="terms-and-conditions">
      <label for="terms-and-conditions">By clicking on ‘sign up’, you’re agreeing to the GST app Terms of Service and Privacy Policy</label>
  
    </div>
    <div class="terms">
      <p>Already have an account? <a href="login.php">Login</a></p>
    
  </div>
  
</body>
</html>