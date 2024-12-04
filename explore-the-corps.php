<?php
require_once "util-db.php"; // Ensure database connection utility is included
require_once "model-explore-the-corps.php"; // Include the model for fetching Corps data
require_once "view-header.php"; // Include the header view
require_once "view-explore-the-corps.php"; // Include the main view for displaying Corps
require_once "view-footer.php"; // Include the footer view

// Set the page title
$pageTitle = "Explore the Corps";

try {
    // Fetch all Corps data using the model
    $corpsList = getCorpsData();

    // Render the views
    renderHeader($pageTitle); // Render the header
    renderCorpsView($corpsList); // Render the Corps details
    renderFooter(); // Render the footer
} catch (Exception $e) {
    // Display an error message if something goes wrong
    echo "Error: " . htmlspecialchars($e->getMessage());
    renderFooter(); // Ensure footer is rendered even in case of an error
}
?>
