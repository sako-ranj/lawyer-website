<?php include 'inc/header.php' ?>
<?php
session_start();
$name = $email = $pass = $exp = $cv = $phone = $city = $bio = $image = $ig = $fb = $wa = $vb = '';
$nameErr = $emailErr = $passErr = $expErr = $cvErr = $phoneErr = $cityErr = $bioErr = $imageErr = $igErr = $fbErr = $waErr = $vbErr = '';
if (isset($_POST['submit'])) {

    if (empty($_POST['name'])) {
        $nameErr = 'Name is required';
    } else {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (empty($_POST['email'])) {
        $emailErr = 'Email is required';
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (empty($_POST['password'])) {
        $passErr = 'pass is required';
    } else {
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
    if (empty($_POST['experience'])) {
        $expErr = 'Experience is required';
    } else {
        $exp = filter_input(INPUT_POST, 'experience', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (empty($_POST['phone'])) {
        $phoneErr = 'Phone number is required';
    } else {
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (empty($_POST['city'])) {
        $cityErr = 'City is required';
    } else {
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (empty($_POST['bio'])) {
        $bioErr = 'Bio is required';
    } else {
        $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (empty($_POST['ig'])) {
        $igErr = 'Instagram handle is required';
    } else {
        $ig = filter_input(INPUT_POST, 'ig', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (empty($_POST['fb'])) {
        $fbErr = 'Facebook handle is required';
    } else {
        $fb = filter_input(INPUT_POST, 'fb', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (empty($_POST['wa'])) {
        $waErr = 'Whatsapp handle is required';
    } else {
        $wa = filter_input(INPUT_POST, 'wa', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (empty($_POST['vb'])) {
        $vbErr = 'viber handle is required';
    } else {
        $vb = filter_input(INPUT_POST, 'vb', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    // check file upload

    // check file upload
    if (isset($_FILES['cv'])) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES['cv']['name']);
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = array('pdf');
        if (!in_array($file_type, $allowed_types)) {
            $cvErr = 'Invalid file type. Only PDF files are allowed';
        } elseif ($_FILES['cv']['size'] > 1000000) {
            $cvErr = 'File size is too large. Maximum file size is 1MB';
        } else {
            if (move_uploaded_file($_FILES['cv']['tmp_name'], $target_file)) {
                $cv = $target_file;
            } else {
                $cvErr = 'Error uploading file';
            }
        }
    } else {
        $cvErr = 'Error uploading file';
    }


    // check image upload
    if (isset($_FILES['image'])) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES['image']['name']);
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($file_type, $allowed_types)) {
            $imageErr = 'Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed';
        } else {
            if (move_uploaded_file(
                $_FILES['image']['tmp_name'],
                $target_file
            )) {
                $image = $target_file;
            } else {
                $imageErr = 'Error uploading file';
            }
        }
    } else {
        $imageErr = 'Error uploading file';
    }




    // if there are no errors, proceed to save data to database
    if ($nameErr == '' && $emailErr == '' && $passErr == '' && $expErr == '' && $cvErr == '' && $phoneErr == '' && $cityErr == '' && $bioErr == '' && $imageErr == '' && $igErr == '' && $fbErr == '' && $waErr == '' && $vbErr == '') {
        $_SESSION['success_msg'] = "You have successfully signed up!";
        $_SESSION['lawyer_loggedin'] = true;
        $_SESSION['lawyer_name'] = $name;

        // prepare sql statement to insert data
        $sql = "INSERT INTO lawyers (name, email, password, experience, phone, city, bio, cv, image, instagram, facebook, whatsapp, viber) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // create prepared statement
        $stmt = mysqli_prepare($conn, $sql);

        // bind parameters to prepared statement
        mysqli_stmt_bind_param($stmt, 'sssssssssssss', $name, $email, $pass, $exp, $phone, $city, $bio, $cv, $image, $ig, $fb, $wa, $vb);

        // execute prepared statement
        mysqli_stmt_execute($stmt);

        // close statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        // redirect to index page
        header('Location: index.php');
        exit();
    }
} ?>

<div class="signup">
    <h1>Lawyer Sign Up</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="signup-form" enctype="multipart/form-data">

        <div>
            <label for="name">Name:</label>
            <input type="text" class="form-control <?php echo !$nameErr ?: 'is-invalid'; ?>" name="name" id="signup-name">
            <div id="validationServerFeedback" class="invalid-feedback">
                Please provide a valid name.
            </div>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" class="form-control <?php echo !$emailErr ?: 'is-invalid'; ?>" name="email" id="signup-email">
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
        <div>
            <label for="experience">Experience:</label>
            <input type="text" class="form-control <?php echo !$expErr ?: 'is-invalid'; ?>" name="experience" id="signup-experience">
            <div id="validationServerFeedback" class="invalid-feedback">
                Please provide a valid experience .
            </div>
        </div>
        <div>
            <label for="CV">CV:</label>
            <input type="file" class="form-control <?php echo !$cvErr ?: 'is-invalid'; ?>" name="cv" id="signup-cv" accept=".pdf" required>
            <div id="validationServerFeedback" class="invalid-feedback">
                Please provide a valid file.
            </div>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control <?php echo !$phoneErr ?: 'is-invalid'; ?>" name="phone" id="signup-phone">
            <div id="validationServerFeedback" class="invalid-feedback">
                Please provide a valid phone number .
            </div>
        </div>
        <div>
            <label for="city">city:</label>
            <input type="text" class="form-control <?php echo !$cityErr ?: 'is-invalid'; ?>" name="city" id="signup-city">
            <div id="validationServerFeedback" class="invalid-feedback">
                Please provide a valid city.
            </div>
        </div>
        <div>
            <label for="bio">Introduce yourself:</label>
            <input type="text" class="form-control <?php echo !$bioErr ?: 'is-invalid'; ?>" name="bio" id="signup-bio">
            <div id="validationServerFeedback" class="invalid-feedback">
                Please provide a valid bio.
            </div>
        </div>
        <div>
            <label for="image">upload picture:</label>
            <input type="file" class="form-control <?php echo !$imageErr ?: 'is-invalid'; ?>" name="image" id="signup-image" accept=".jpg,.jpeg,.png,.gif" required>
            <div id="validationServerFeedback" class="invalid-feedback">
                Please provide a valid image.
            </div>
        </div>

        <div>Socials:
            <div>
                <label for="ig">Instagram:</label>
                <input type="text" class="form-control <?php echo !$igErr ?: 'is-invalid'; ?>" name="ig" id="signup-ig">
                <div id="validationServerFeedback" class="invalid-feedback">
                    Please provide a valid instagram link.
                </div>
            </div>
            <div>
                <label for="fb">facebook:</label>
                <input type="text" class="form-control <?php echo !$fbErr ?: 'is-invalid'; ?>" name="fb" id="signup-fb">
                <div id="validationServerFeedback" class="invalid-feedback">
                    Please provide a valid facebook link.
                </div>
                <div>
                    <label for="wa">whatsapp:</label>
                    <input type="text" class="form-control <?php echo !$waErr ?: 'is-invalid'; ?>" name="wa" id="signup-wa">
                    <div id="validationServerFeedback" class="invalid-feedback">
                        Please provide a valid whatsapp link.
                    </div>
                    <div>
                        <label for="vb">viber:</label>
                        <input type="text" class="form-control <?php echo !$vbErr ?: 'is-invalid'; ?>" name="vb" id="signup-vb">
                        <div id="validationServerFeedback" class="invalid-feedback">
                            Please provide a valid viber link.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" name="submit" value="Sign Up">

    </form>
    <p>Already have a lawyer account? <a href="lawyer_login.php">Login</a></p>
    <p>Are you a user? <a href="signup.php">Sign up</a></p>
</div>
</body>

</html>

<script>
    // validate file size
    const cvInput = document.getElementById('signup-cv');
    cvInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        const maxFileSize = 5 * 1024 * 1024; // 5MB
        if (file.size > maxFileSize) {
            event.preventDefault();
            document.getElementById('cv-validation').innerHTML = 'File size exceeds 5MB limit.';
        } else {
            document.getElementById('cv-validation').innerHTML = '';
        }
    });

    const imageInput = document.getElementById('signup-image');
    imageInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        const maxFileSize = 5 * 1024 * 1024; // 5MB
        if (file.size > maxFileSize) {
            event.preventDefault();
            document.getElementById('image-validation').innerHTML = 'File size exceeds 5MB limit.';
        } else {
            document.getElementById('image-validation').innerHTML = '';
        }
    });
</script>