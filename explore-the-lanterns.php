<?php
require_once 'util-db.php'; // Database connection
require_once 'model-explore-the-lanterns.php'; // Model for fetching Lantern data

$pageTitle = "Explore the Lanterns";
include 'view-header.php'; // Include header with navigation

try {
    $lanternsList = getLanternsData(); // Fetch Lantern data
    if (!$lanternsList || $lanternsList->num_rows === 0) {
        echo '<div class="text-center text-warning mt-5">No Lantern data available at this time.</div>';
    } else {
        include 'view-explore-the-lanterns.php'; // Include view to display Lanterns
    }
} catch (Exception $e) {
    echo '<div class="text-center text-danger mt-5">Error loading Lantern data: ' . $e->getMessage() . '</div>';
}

include 'view-footer.php'; // Include footer
?>
