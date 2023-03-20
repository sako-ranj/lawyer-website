<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Website</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a href="#" class="logo">My Website</a>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#cards-container">lawyers</a></li>
                <li><a href="#">Log in</a></li>
                <li><a href="#">Sign up</a></li>
            </ul>
            <div class="burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>
    </nav>

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
    <div class="cards-container">
        <div class="card">
            <img src="https://via.placeholder.com/300x200" alt="Card Image" />
            <div class="card-content">
                <h3>Card Title 1</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                    aliquam aliquam lorem, in pulvinar nibh rhoncus nec.
                </p>
                <button>Read More</button>
            </div>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/300x200" alt="Card Image" />
            <div class="card-content">
                <h3>Card Title 2</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                    aliquam aliquam lorem, in pulvinar nibh rhoncus nec.
                </p>
                <button>Read More</button>
            </div>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/300x200" alt="Card Image" />
            <div class="card-content">
                <h3>Card Title 3</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                    aliquam aliquam lorem, in pulvinar nibh rhoncus nec.
                </p>
                <button>Read More</button>
            </div>
        </div>
    </div>
    <div class="faqs-container">
        <h2>Frequently Asked Questions</h2>
    </div>

    <script src="script.js"></script>
</body>

</html>