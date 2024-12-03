<?php
$pageTitle = "Lantern Corps Home";
include "view-header.php";
?>

<!-- Full-page container with background -->
<div class="container-fluid text-center text-white full-page-background" role="img" aria-label="Lantern Corps spectrum background image">

    <!-- Buttons Section -->
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">

        <!-- Home Button -->
        <div class="text-center mb-4 w-75">
            <a href="index.php" class="btn btn-light btn-lg w-100 text-dark" aria-label="Go to Home Page">Home</a>
        </div>

        <!-- Navigation Buttons Section -->
        <div class="row row-cols-1 row-cols-md-3 w-75">
            <div class="col">
                <a href="explorecorps.php" class="btn btn-warning btn-lg w-100 mb-3" aria-label="Explore Lantern Corps">Explore Corps</a>
            </div>
            <div class="col">
                <a href="notable_lanterns.php" class="btn btn-light btn-lg w-100 mb-3 text-dark" aria-label="View Notable Lanterns">Notable Lanterns</a>
            </div>
            <div class="col">
                <a href="about.php" class="btn btn-indigo btn-lg w-100 mb-3" style="background-color: indigo; color: white;" aria-label="Learn About the Project">About the Project</a>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include "view-footer.php"; ?>
