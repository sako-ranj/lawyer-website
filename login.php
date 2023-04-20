<?php include 'inc/header.php' ?>
<?php
if (isset($_POST['submit'])) {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);


  // Query the database to get the user with the email and password
  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    // Login successful
    header('Location: index.php');
  } else {
    // Login failed
    $error = 'Invalid email or password.';
  }

  mysqli_close($conn);
}
?>
<div class="login">
  <h1>Login</h1>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="login-form">
    <label for="email">Email:</label>
    <input type="email" name="email" id="login-email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="login-password" required>

    <input type="submit" value="Login" name="submit">
  </form>
  <?php if (isset($error)) { ?>
    <div class="error"><?php echo $error; ?></div>
  <?php } ?>
  <p>Don't have an account? <a href="signup.php">Sign up</a></p>
</div>
</body>

</html>