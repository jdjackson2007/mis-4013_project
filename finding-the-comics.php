<?php
require_once 'model-finding-the-comics.php'; // Include model for fetching comics

$pageTitle = "Finding the Comics"; // Set the page title

require_once 'util-db.php';
require_once 'fetch-finding-the-comics.php';

fetchAndStoreComics();

// Fetch comics data
try {
    $comicsList = getComicsFromDatabase();
} catch (Exception $e) {
    $comicsList = [];
    error_log("Error fetching comics: " . $e->getMessage());
}

// Include the view to render the page
require_once 'view-finding-the-comics.php';
?>
