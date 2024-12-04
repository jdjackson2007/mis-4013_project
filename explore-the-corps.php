<?php
Require_Once("util-db.php");
Require_Once("model-explore-the-corps.php");
$pageTitle = "The Corps";
include "view-header.php";
try {
    $corpsList = getCorpsData(); // Fetch Corps data
    renderCorpsView($corpsList); // Pass the data to the view for rendering
include "view-explore-the-corps.php";
include "view-footer.php";
?>
