<?php
Require_Once("util-db.php");
Require_Once("model-category.php");
$pageTitle = "Explore the Corps";
include "view-header.php";
 $corpsList = getCorpsData();
include "view-explore-the-corps.php";
include "view-footer.php";
?>
