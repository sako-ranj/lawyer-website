<?php include 'inc/header.php' ?>
<?php
$email = $password = '';
$emailErr = $passwordErr = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['email'])) {
        $emailErr = 'Email is required';
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = 'Invalid email format';
        }
    }
    if (empty($_POST['password'])) {
        $passwordErr = 'Password is required';
    } else {
        $password = $_POST['password'];
    }

    if ($emailErr == '' && $passwordErr == '') {
        $sql = "SELECT * FROM lawyers WHERE email = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, 's', $email);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['lawyer_id'] = $row['id'];
                $_SESSION['lawyer_name'] = $row['name'];
                $_SESSION['user_type'] = 'lawyer';

        
                header('Location: index.php');
                exit;
            } else {
                $passwordErr = 'Invalid email or password';
            }
        } else {
            $passwordErr = 'Invalid email or password';
        }

        mysqli_stmt_close($stmt);
    }
}
?>
<div class="signup">
    <h1>Lawyer Login</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="email" class="form-control <?php echo !$emailErr ?: 'is-invalid'; ?>" name="email" id="signup-email" value="<?php echo $email; ?>">
            <div id="validationServerFeedback" class="invalid-feedback">
                Please provide a valid email.
            </div>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" class="form-control <?php echo !$passErr ?: 'is-invalid'; ?>" name="password" id="signup-password">
            <div id="validationServerFeedback" class="invalid-feedback">
                Please provide a valid pass.
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </form>

</div>