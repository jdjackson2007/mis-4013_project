<?php
// explorecorps.php
// This file serves as the controller to fetch data about Lantern Corps 
// and pass it to the corresponding view for rendering.

require_once 'model-explorecorps.php';

// Fetch all Lantern Corps data
$corpsData = getAllCorps();

// Total number of Corps (useful for the view)
$totalCorps = count($corpsData);

// Include the view file
include 'view-explorecorps.php';
?>
