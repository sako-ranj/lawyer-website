<?php include 'inc/header.php'?>
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
                <button onclick="">Read More</button>
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
                <a href="profile_screen.php"> <button>Read More</button></a>
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