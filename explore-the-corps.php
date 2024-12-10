<?php
Require_Once("util-db.php");
Require_Once("model-explore-the-corps.php");
include "view-header.php";
$pageTitle = "The Corps";

    $corpsList = getCorpsData();
include "view-explore-the-corps.php";
include "view-footer.php";
?>
