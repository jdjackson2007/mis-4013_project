<?php
// explore-the-corps.php

require_once 'model-explore-the-corps.php';
require_once 'view-explore-the-corps.php';

// Fetch all Corps data
$corpsList = getCorpsData();

// Render the view
renderCorpsView($corpsList);
?>
