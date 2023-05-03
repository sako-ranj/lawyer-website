<?php include 'inc/header.php' ?>
<?php


// Check if the search query was submitted
if (isset($_GET['search'])) {
    // Sanitize the search input
    $search_query = $mysqli->real_escape_string($_GET['search']);

    // Construct the query to search for lawyers with matching names
    $query = "SELECT * FROM lawyers WHERE name LIKE '%$search_query%'";

    // Execute the query
    $result = $mysqli->query($query);

    // Check if any results were found
    if ($result->num_rows > 0) {
        // Output the cards for the matching lawyers
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<img src="' . $row['image'] . '" alt="Card Image" />';
            echo '<div class="card-content">';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<p>' . $row['bio'] . '</p>';
            echo '<a href="profile_screen.php?id=' . $row['id'] . '"><button class="cyan-button">View Profile</button></a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        // Output a message indicating no results were found
        echo '<p>No lawyers found.</p>';
    }

    // Free the result set
    $result->free();
}

// Close the database connection
$mysqli->close();
