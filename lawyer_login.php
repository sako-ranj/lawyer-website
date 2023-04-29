<?php include 'inc/header.php' ?>
<?php
session_start();
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

    // If there are no errors, proceed to check the credentials against the database
    if ($emailErr == '' && $passwordErr == '') {
        // prepare sql statement to fetch user data
        $sql = "SELECT * FROM lawyers WHERE email = ?";

        // create prepared statement
        $stmt = mysqli_prepare($conn, $sql);

        // bind parameters to statement
        mysqli_stmt_bind_param($stmt, 's', $email);

        // execute statement
        mysqli_stmt_execute($stmt);

        // get result set
        $result = mysqli_stmt_get_result($stmt);

        // check if user exists and password is correct
        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                // set session variables
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                echo "done";
                // redirect to dashboard
                header('Location: index.php');
                exit;
            } else {
                $passwordErr = 'Invalid email or password';
                echo "not done1";
            }
        } else {
            echo "not done2";

            $passwordErr = 'Invalid email or password';
        }

        // close statement
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