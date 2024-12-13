<?php
// Include necessary files
require_once 'model-finding-the-comics.php'; // Model for fetching data
include 'view-header.php'; // Header

// Set page title
$pageTitle = "Finding the Comics";

try {
    // Fetch data from the model
    $comicSources = getComicSources();
    $topLanternComics = getTopLanternComics();
    $premiumComics = getPremiumComics();
} catch (Exception $e) {
    // Log the error and display a user-friendly message
    error_log("Error fetching comic data: " . $e->getMessage());
    $comicSources = $topLanternComics = $premiumComics = [];
    $errorMessage = "We encountered an error while loading the comics. Please try again later.";
}

// Include the view
require_once 'view-finding-the-comics.php';

// Include the footer
include 'view-footer.php';
?>
