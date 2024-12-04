<?php
$pageTitle = "Lantern Corps Home";
include "view-header.php";
?>
<div class="container-fluid text-center text-white home-background">
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
        <div class="row w-75">
            <div class="col-md-4">
                <a href="explorecorps.php" class="btn btn-warning btn-lg w-100 mb-3">Explore Corps</a>
            </div>
            <div class="col-md-4">
                <a href="notable_lanterns.php" class="btn btn-light btn-lg w-100 mb-3 text-dark">Notable Lanterns</a>
            </div>
            <div class="col-md-4">
                <a href="about.php" class="btn btn-primary btn-lg w-100 mb-3">About the Project</a>
            </div>
        </div>
    </div>
</div>
<?php include "view-footer.php"; ?>
