<?php
require_once("util-db.php"); // Include database connection utility
require_once("model-explore-the-lanterns.php"); // Include the model for Lanterns
include "view-header.php"; // Include the header view

$pageTitle = "The Lanterns"; // Set the page title

// Fetch the Lantern data
$lanternsList = getLanternsData();

// Include the view for Lanterns
include "view-explore-the-lanterns.php";

// Include the footer view
include "view-footer.php";
?>
