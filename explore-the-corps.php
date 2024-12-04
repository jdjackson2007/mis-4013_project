<?php
// explore-the-corps.php

// Include the model and view
require_once 'model-explore-the-corps.php';
require_once 'view-explore-the-corps.php';

// Check if the form is submitted to add a new Corps
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $corpsName = $_POST['corps_name'];
    $corpsDescription = $_POST['corps_description'];
    $corpsEmotion = $_POST['corps_emotion'];
    $corpsColor = $_POST['corps_color'];

    // Call the function to add a new Corps
    addCorps($corpsName, $corpsDescription, $corpsEmotion, $corpsColor);
}

// Fetch all Corps
$corpsList = getCorps();

// Render the view
renderCorpsView($corpsList);
