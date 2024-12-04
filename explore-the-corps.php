<?php
// explore-the-corps.php

require_once 'util-db.php'; // Database connection utility
require_once 'model-explore-the-corps.php'; // Model for fetching Corps data
require_once 'view-header.php'; // Header view
require_once 'view-explore-the-corps.php'; // Main view for Corps
require_once 'view-footer.php'; // Footer view

// Fetch all Corps data
$corpsList = getCorpsData(); // Fetch data using the model

// Render the page
renderHeader("Explore the Corps"); // Render the header with a title
renderCorpsView($corpsList); // Render the main view with data
renderFooter(); // Render the footer
?>

