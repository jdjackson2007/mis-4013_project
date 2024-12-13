<?php
require_once 'model-finding-the-comics.php'; 
require_once 'view-header.php'; 

$pageTitle = "Finding the Comics"; 


try {
    $comicsList = getComicsData();
} catch (Exception $e) {
    $comicsList = [];
    error_log("Error fetching comics: " . $e->getMessage());
}


require_once 'view-finding-the-comics.php';

require_once 'view-footer.php'; /
?>
