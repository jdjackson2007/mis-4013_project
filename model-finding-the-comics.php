<?php
require_once 'util-db.php'; // Include the database connection utility

/**
 * Fetch all comics from the database
 *
 * @return array List of comics
 */
function getComicsFromDatabase() {
    $conn = get_db_connection(); // Get the database connection
    $query = "SELECT Comics_Title, Comics_Description, Comics_Seller, Comics_Price, Comics_Rating, Comics_Category, Comics_URL FROM comics_table ORDER BY Comics_Updated_At DESC";
    $result = $conn->query($query);

    $comics = [];
    while ($row = $result->fetch_assoc()) {
        $comics[] = $row; // Add each comic to the array
    }

    $conn->close(); // Close the database connection
    return $comics;
}

/**
 * Fetch premium comics (price > $10,000)
 *
 * @return array List of premium comics
 */
function getPremiumComicsFromDatabase() {
    $conn = get_db_connection(); // Get the database connection
    $query = "SELECT Comics_Title, Comics_Description, Comics_Seller, Comics_Price, Comics_Rating, Comics_Category, Comics_URL FROM comics_table WHERE Comics_Price > 10000 ORDER BY Comics_Price DESC";
    $result = $conn->query($query);

    $comics = [];
    while ($row = $result->fetch_assoc()) {
        $comics[] = $row;
    }

    $conn->close(); // Close the database connection
    return $comics;
}
?>
