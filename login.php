<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
   
</head>

<body>
<nav class="navbar">
    <div class="container">
      <a href="#" class="logo">My Website</a>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="index.php">lawyers</a></li>
        <li><a href="login.php">Log in</a></li>
        <li><a href="signup.php">Sign up</a></li>
      </ul>
      <div class="burger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </div>
  </nav>

    <div class="login">
        <h1>Login</h1>
        <form action="process_login.php" method="POST" id="login-form">
            <label for="email">Email:</label>
            <input type="email" name="email" id="login-email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="login-password" required>

            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
</body>

</html>