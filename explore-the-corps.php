<?php
require_once 'model-explore-the-corps.php';

try {
    $corpsList = getCorpsData(); // Fetch Corps data
    renderCorpsView($corpsList); // Pass the data to the view for rendering
} catch (Exception $e) {
    echo "Error: " . htmlspecialchars($e->getMessage());
}
?>
