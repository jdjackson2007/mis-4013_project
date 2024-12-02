<?php
// explorecorps.php
require_once 'model-explorecorps.php';

// Fetch all Corps data from the database
$corpsData = getAllCorps();

// Include the view
include 'view-explorecorps.php';
?>
