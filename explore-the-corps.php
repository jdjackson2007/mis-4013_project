<?php
require_once("util-db.php");
require_once("model-explore-the-corps.php");

$pageTitle = "The Corps";
include "view-header.php";

try {
    $corpsList = getCorpsData();
    if (!$corpsList || $corpsList->num_rows === 0) {
        echo '<div class="text-center text-warning mt-5">No Corps data available at this time.</div>';
    } else {
        include "view-explore-the-corps.php";
    }
} catch (Exception $e) {
    echo '<div class="text-center text-danger mt-5">Error loading Corps data: ' . $e->getMessage() . '</div>';
}

include "view-footer.php";
?>
