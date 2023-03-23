<!DOCTYPE html>
<html>

<head>
   
    <title>Sign Up Page</title>
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
    <div class="signup">
        <h1>Sign Up</h1>
        <form action="process_signup.php" method="POST" id="signup-form">
            <label for="name">Name:</label>
            <input type="text" name="name" id="signup-name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="signup-email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="signup-password" required>

            <input type="submit" value="Sign Up">
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>

</html>