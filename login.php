<?php include 'inc/header.php' ?>

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