<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

  <title>Document</title>
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

<body>
  <nav class="navbar">
    <div class="container">
      <a href="#" class="logo">My Website</a>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="index.php">lawyers</a></li>
        <li><a href="login.php">Log in</a></li>
        <li><a href="signup.php">Sign up</a></li>
      </ul>
      <div class="burger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </div>
  </nav>
  <div class="profile-container">
    <div class="profile-left">
      <img src="images/male_lawyer.png" alt="Profile Picture" class="profile-picture" />
    </div>
    <div class="profile-right">
      <table class="profile-info">
        <tbody>
          <tr>
            <td><i class="material-icons"> call </i> name</td>
          </tr>
          <tr>
            <td><i class="material-icons"> Experience  </i> Experience</td>
          </tr>
          <tr>
            <td><i class="material-icons"> call </i> CV</td>
          </tr>

          <tr>
            <td><i class="material-icons"> call </i> +123456789</td>
          </tr>
          <tr>
            <td><i class="material-icons"> email</i> example@example.com</td>
          </tr>
          <tr>
            <td><i class="material-icons"> call</i> City, Country</td>
          </tr>
        </tbody>
      </table>
      <p class="profile-bio">
        biloghraphyyyyyyyy Lorem ipsum dolor sit amet, consectetur adipiscing
        elit. Sed euismod justo et lorem commodo, id volutpat arcu congue.
        Donec gravida, velit quis feugiat ullamcorper, eros justo finibus
        orci, a aliquet lectus mi vel libero. Nullam finibus viverra semper.
        Donec id urna quam. Nunc at ante ac metus maximus convallis. In
        molestie ultrices libero sit amet faucibus.
      </p>

      <div class="bottom-bar">
        <a href="#" target="_blank"><img src="images/insta.png" alt="Instagram"></a>
        <a href="#" target="_blank"><img src="images/facebook.png" alt="Facebook"></a>
        <a href="#" target="_blank"><img src="images/whatsapp.png" alt="WhatsApp"></a>
        <a href="#" target="_blank"><img src="images/viber.png" alt="Viber"></a>
      </div>

    </div>
  </div>

</body>

</html>