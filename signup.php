<!DOCTYPE html>
<html>

<head>
    <title>Sign Up Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
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