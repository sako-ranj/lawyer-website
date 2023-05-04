<?php
include 'inc/header.php';
if (isset($_SESSION['user_name'])) {
    $username = $_SESSION['user_name'];
?>
    <div class="container">
        <h1 id="welcome" style="margin-left: 150px;"> <?php 
        if($_SESSION['user_type']!='a'){
            echo "welcome mr. ".$_SESSION['user_name'];  
        }
            ?>
        </h1>
    </div>
<?php } ?>
<div class="slider">
    <div class="slides">
        <div class="slide slide1"></div>
        <!---->
        <div class="slide slide2"></div>
        <!---->
        <div class="slide slide3"></div>
        <!---->
    </div>
    <a class="prev" onclick="prevSlide()">&#10094;</a>
    <a class="next" onclick="nextSlide()">&#10095;</a>
</div>
<div class="row">
    <div class="col-md-8 mx-auto">
        <h1 class="text-center">Lawyers</h1>
        <form id="search-form" action="search_lawyers.php" method="GET">
            <input type="text" id="search-input" name="query" placeholder="Search lawyers">
            <button type="submit">Search</button>
        </form>
    </div>
</div>
<div class="cards-container">
    <?php

    $result = $mysqli->query("SELECT * FROM lawyers");

    while ($row = $result->fetch_assoc()) {
    ?>
        <div class="card">
            <img src="<?php echo $row['image']; ?>" alt="Lawyer Photo">
            <h2><?php echo $row['name']; ?></h2>
            <p><?php echo $row['bio']; ?></p>
            <div class="button-container">
                <form action="profile_screen.php" method="POST">
                    <input type="hidden" name="row" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="cyan-button view-profile">View Profile</button>
                </form>
            </div>
        </div>
    <?php
    }

    $mysqli->close();
    ?>
</div>


<script src="script.js"></script>
</body>

</html>
<script>
    window.addEventListener("load", function() {
        var welcome = document.getElementById("welcome");

        setTimeout(function() {
            welcome.style.opacity = "0";
        }, 2000);
    });
</script>