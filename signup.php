<?php
$name = $email = $pass = '';
$nameErr = $emailErr = $passErr = '';
if (isset($_POST['submit'])) {
  if (empty($_POST['name'])) {
    $nameErr = 'name is required';
  } else {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($_POST['email'])) {
    $emailErr = 'email is required';
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($_POST['pass'])) {
    $passErr = 'pass is required';
  } else {
    $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  if (empty($nameErr) && empty($emailErr) && empty($passErr)) {
    // add to database
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')";
    if (mysqli_query($conn, $sql)) {
      // success
      header('Location: index.php');
    } else {
      // error
      echo 'Error: ' . mysqli_error($conn);
    }
  }
}
?>
<?php include 'inc/header.php' ?>
<div class="signup">
  <h1>Sign Up</h1>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="signup-form">
    <label for="name">Name:</label>
    <input type="text" class="form-control <?php echo !$nameErr ?: 'is-invalid'; ?>" name="name" id="signup-name" required>

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