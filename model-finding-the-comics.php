<?php
require_once 'util-db.php'; // Include the database connection utility

/**
 * Fetch all comics from the database
 * 
 * @return array List of comics
 */
function getComicsFromDatabase() {
    $conn = get_db_connection(); // Get the database connection
    $query = "SELECT Comics_Title, Comics_Description, Comics_Seller, Comics_Price, Comics_Rating, Comics_URL FROM comics_table";
    $result = $conn->query($query);

    if (!$result) {
        die("Database query failed: " . $conn->error); // Debug if query fails
    }

    $comics = [];
    while ($row = $result->fetch_assoc()) {
        $comics[] = $row; // Add each comic to the array
    }

    $conn->close(); // Close the database connection
    return $comics;
}
?>
