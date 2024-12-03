<?php


require_once 'model-explorecorps.php';


$corpsData = getAllCorps();


$emotions = getAllEmotions();
$headquarters = getAllHeadquarters();


$totalCorps = count($corpsData);


include 'view-explorecorps.php';
?>
