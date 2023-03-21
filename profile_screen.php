<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

  <title>Document</title>
  <style>
    body {
      background-color: #f6f1f1;
    }

    .profile-container {
      display: flex;
      flex-direction: row;
      background-color: #f2f2f2;
      padding: 20px;
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
  </style>
</head>

<body>
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
            <td><i class="material-icons"> call </i> name</td>
          </tr>
          <tr>
            <td><i class="material-icons"> call </i> name</td>
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
    </div>
  </div>
  <a href="index.php">
    <button id="getBack">HOME</button>
  </a>
</body>

</html>