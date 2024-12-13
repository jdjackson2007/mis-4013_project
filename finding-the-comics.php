<?php
require_once 'model-finding-the-comic.php'; // Include the model to fetch comic data
require_once 'view-header.php'; // Include the header file

$pageTitle = "Finding the Comics"; // Page title

// Fetch comics data
try {
    $comicsList = getComicsData();
} catch (Exception $e) {
    $comicsList = [];
    error_log("Error fetching comics: " . $e->getMessage());
}

// Include the view to render the page
require_once 'view-finding-the-comic.php';

require_once 'view-footer.php'; // Include the footer file
?>
