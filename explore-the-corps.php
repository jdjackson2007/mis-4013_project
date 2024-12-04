<?php
// explore-the-corps.php

// Ensure required files are included
require_once 'util-db.php'; // Database connection utility
require_once 'model-explore-the-corps.php'; // Model for fetching Corps data
require_once 'view-header.php'; // Header view
require_once 'view-explore-the-corps.php'; // Main view for Corps data
require_once 'view-footer.php'; // Footer view

try {
    // Fetch all Corps data using the model
    $corpsList = getCorpsData();

    // Render the page
    renderHeader("Explore the Corps"); // Render the header with a title
    renderCorpsView($corpsList); // Render the main view with data
    renderFooter(); // Render the footer
} catch (Exception $e) {
    // Handle errors gracefully
    echo "Error: " . htmlspecialchars($e->getMessage());
    renderFooter(); // Ensure footer is always rendered
}
?>
