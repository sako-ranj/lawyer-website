<?php

include 'inc/header.php';

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

  if (empty($_POST['password'])) {
    $passErr = 'pass is required';
  } else {
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
  }

  if (empty($nameErr) && empty($emailErr) && empty($passErr)) {
    // add to database
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')";
    if (mysqli_query($conn, $sql)) {
      // success
      $_SESSION['success_msg'] = "You have successfully signed up!";
      $_SESSION['loggedin'] = true;
      $_SESSION['user_name'] = $name;
      $_SESSION['user_type'] = 'user';

      header('Location: index.php');
      exit();
    } else {
      // error
      $_SESSION['error_msg'] = "Oops, something went wrong. Please try again later.";
      header('Location: signup.php');
      exit();
    }
  }
}
?>

<div class="signup">
  <h1>Sign Up</h1>
  <?php if (isset($_SESSION['error_msg'])) : ?>
    <div class="alert alert-danger">
      <?php echo $_SESSION['error_msg']; ?>
    </div>
    <?php unset($_SESSION['error_msg']); ?>
  <?php endif; ?>

  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="signup-form">
    <div>
      <label for="name">Name:</label>
      <input type="text" class="form-control <?php echo !$nameErr ?: 'is-invalid'; ?>" name="name" id="signup-name" value="<?php echo $name; ?>">
      <div id="validationServerFeedback" class="invalid-feedback">
        Please provide a valid name.
      </div>
    </div>
    <div>
      <label for="email">Email:</label>
      <input type="email" class="form-control <?php echo !$emailErr ?: 'is-invalid'; ?>" name="email" id="signup-email" value="<?php echo $email; ?>">
      <div id="validationServerFeedback" class="invalid-feedback">
        Please provide a valid email.
      </div>
    </div>
    <div>
      <label for="password">Password:</label>
      <input type="password" class="form-control <?php echo !$passErr ?: 'is-invalid'; ?>" name="password" id="signup-password" value="<?php echo $pass; ?>">
      <div id="validationServerFeedback" class="invalid-feedback">
        Please provide a valid pass.
      </div>
    </div>
    <input type="submit" value="Sign Up" name="submit">
  </form>

  <p>Already have an account? <a href="login.php">Login</a></p>
  <p>Are you a lawyer? <a href="lawyer_signup.php">Sign up</a></p>
</div>
</body>

</html>