<?php include 'inc/header.php' ?>
<?php 
session_start();
$email = $pass = '';
$emailErr = $passErr = '';
if (isset($_POST['submit'])) {

  if (empty($_POST['email'])) {
    $emailErr = 'email is required';
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($_POST['password'])) {
    $passErr = 'pass is required';
  } else {
    $pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  if (empty($emailErr) && empty($passErr)) {
    // check if user exists in database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      // check password
      if (password_verify($pass, $row['password'])) {
        // login successful
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        header('Location: index.php');
      } else {
        // password incorrect
        $passErr = 'Incorrect password';
      }
    } else {
      // user not found
      $emailErr = 'User not found';
    }
  }
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
