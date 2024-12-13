<?php
require_once 'util-db.php'; // Database connection utility

require_once 'fetch-finding-the-comics.php';

fetchAndStoreComics();

/**
 * Fetch all comics from the database.
 * 
 * @return array List of comics
 */
function getComicsFromDatabase() {
    $conn = get_db_connection(); // Connect to the database

    $query = "SELECT Comics_Title, Comics_Description, Comics_Seller, Comics_Price, Comics_Rating, Comics_URL FROM comics_table";
    $result = $conn->query($query);

    if (!$result) {
        die("Database query failed: " . $conn->error);
    }

    $comics = [];
    while ($row = $result->fetch_assoc()) {
        $comics[] = $row;
    }

    $conn->close(); // Close the connection
    return $comics;
}
?>

