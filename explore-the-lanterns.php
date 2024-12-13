<?php
require_once 'util-db.php'; 
require_once 'model-explore-the-lanterns.php'; 

$pageTitle = "Explore the Lanterns";
include 'view-header.php'; 

try {
    $lanternsList = getLanternsData(); 
    if (!$lanternsList || $lanternsList->num_rows === 0) {
        echo '<div class="text-center text-warning mt-5">No Lantern data available at this time.</div>';
    } else {
        include 'view-explore-the-lanterns.php'; 
    }
} catch (Exception $e) {
    echo '<div class="text-center text-danger mt-5">Error loading Lantern data: ' . $e->getMessage() . '</div>';
}

include 'view-footer.php'; 
?>
