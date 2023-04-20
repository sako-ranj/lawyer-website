<?php include 'inc/header.php' ?>
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
    if (empty($_POST['password'])) {
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
<div class="signup">
    <h1>Sign Up</h1>
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
    <p>Already have a lawyer account? <a href="lawyer-login.php">Login</a></p>
</div>
</body>

</html>

<!-- TODO: modify for lawyer sign up-->