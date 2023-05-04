<?php include 'inc/header.php' ?>


<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    background-color: #f6f1f1;
  }

  .navbar {
    /* rgba(0, 0, 0, 0.5) */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: gray;
    ;
    z-index: 100;
    margin-bottom: 30px;
  }

  .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
  }

  .logo {
    color: #eeeeee;
    font-size: 24px;
    text-decoration: none;
  }

  .logo:hover {
    color: #00adb5;
  }

  .nav-links {
    display: flex;
    justify-content: space-between;
    list-style: none;
  }

  .nav-links li {
    margin: 0 10px;
  }

  .nav-links li a {
    color: #eeeeee;
    text-decoration: none;
  }

  .nav-links li a:hover {
    color: #00adb5;
  }

  .burger {
    display: none;
    cursor: pointer;
  }

  .burger .line {
    width: 25px;
    height: 3px;
    background-color: #eeeeee;
    margin: 5px;
  }

  .profile-container {
    display: flex;
    flex-direction: row;
    background-color: #f2f2f2;
    padding: 20px;
    margin-top: 60px;
  }

  .profile-left {
    flex: 1;
  }

  .profile-right {
    flex: 2;
    margin-left: 20px;
  }

  .profile-picture {
    width: 100%;
    height: auto;
  }

  .profile-info {
    width: 100%;
    padding: 10px;

    margin: auto;

    border: none;
    border-collapse: separate;
    border-spacing: 0 15px;
  }

  .profile-info td {
    padding: 10px;
    border: none;
    border-radius: 10px;
    text-align: left;
    font-size: 16px;
    background-color: darkgrey;
    color: #f6f1f1;
  }

  .profile-bio {
    font-size: 16px;
    text-align: justify;
    margin-top: 0;
  }

  i {
    position: relative;
    top: 5px;
    color: #146c94;
  }

  #getBack {
    position: relative;
    left: 50%;
    background-color: #146c94;
    color: #f6f1f1;
    border-radius: 10px;
    font-size: 25px;
  }

  #getBack:hover {
    background-color: #f6f1f1;
    color: #146c94;
    transition: 1s;
  }

  .bottom-bar {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f6f1f1;
    padding: 10px;
  }

  .bottom-bar a {
    margin-right: 10px;
  }

  .bottom-bar img {
    height: 30px;
    padding-left: 50px;
  }

  @media screen and (max-width: 600px) {
    .bottom-bar {
      flex-wrap: wrap;
    }

    .bottom-bar a {
      margin: 5px;
    }
  }
</style>
</head>
<?php
// Start the session
session_start();

// Check if the user is logged in, otherwise redirect to the login page
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//   header('location: login.php');
//   exit;
// }

// Check if the id parameter is present in the URL
if (!isset($_POST['row'])) {
  header('location: index.php');
  exit;
}

// Include the database connection file


// Find the lawyer by the id
$id = $_POST['row'];
$result = $mysqli->query("SELECT * FROM lawyers WHERE id='$id'");

// Check if the lawyer was found
if ($result->num_rows === 0) {
  echo "index.php";
  // header('location: index.php');
  exit;
}

// Get the lawyer information
$row = $result->fetch_assoc();
$name = $row['name'];
$experience = $row['experience'];
$cv = $row['cv'];
$phone = $row['phone'];
$email = $row['email'];
$location = $row['city'];
$bio = $row['bio'];
$image = $row['image'];
$ig = $row['instagram'];
$fb = $row['facebook'];
$wa = $row['whatsapp'];
$vb = $row['viber'];

// Close the database connection
$mysqli->close();
?>



<div class="profile-container">
  <div class="profile-left">
    <img src="<?php echo $image; ?>" alt="Profile Picture" class="profile-picture" />
  </div>
  <div class="profile-right">
    <table class="profile-info">
      <tbody>
        <tr>
          <td><i class="material-icons"> name </i> <?php echo $name; ?></td>
        </tr>
        <tr>
          <td><i class="material-icons"> Experience </i> <?php echo $experience; ?></td>
        </tr>
        <tr>
          <td><i class="material-icons"> cv </i> <?php echo $cv; ?></td>
        </tr>

        <tr>
          <td><i class="material-icons"> call </i> <?php echo $phone; ?></td>
        </tr>
        <tr>
          <td><i class="material-icons"> email</i> <?php echo $email; ?></td>
        </tr>
        <tr>
          <td><i class="material-icons"> location</i> <?php echo $location; ?></td>
        </tr>
      </tbody>
    </table>
    <h1>bio</h1>
    <p class="profile-bio">
      <?php echo $bio; ?>
    </p>
    <div class="bottom-bar">
      <a href=<?php echo $ig; ?> target="_blank"><img src="images/insta.png" alt="Instagram"></a>
      <a href=<?php echo $fb; ?> target="_blank"><img src="images/facebook.png" alt="Facebook"></a>
      <a href=<?php echo $wa; ?> target="_blank"><img src="images/whatsapp.png" alt="WhatsApp"></a>
      <a href=<?php echo $vb; ?> target="_blank"><img src="images/viber.png" alt="Viber"></a>
    </div>

  </div>
</div>

</body>

</html>