<?php
require_once("model-finding-the-comics.php"); // Load the correct model for this page

$pageTitle = "Finding the Comics"; // Set the page title
include "view-header.php"; // Include the header

// Fetch comic data
try {
    $comicSources = getComicSources();
    $topLanternComics = getTopLanternComics();
    $premiumComics = getPremiumComics();
} catch (Exception $e) {
    die("Error loading data: " . $e->getMessage());
}

require_once 'view-finding-the-comics.php'; // Include the view for displaying comics
include "view-footer.php"; // Include the footer
?>
