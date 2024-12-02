<?php
$pageTitle = "Lantern Corps Home";
include "view-header.php";
?>

<!-- Full-page container with background -->
<div class="container-fluid text-center text-white" style="background-image: url('https://3.bp.blogspot.com/-UbPydZyEqig/USxPpJVNBJI/AAAAAAAAE_Q/oKj7rgMDbzg/s1600/Lantern_Corps_Spectrum_by_tytemp1980.jpg'); background-size: cover; background-position: center; height: 100vh;">

    <!-- Header Section -->
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
        <h1 class="display-4 mb-4" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);">Lantern Corps Database</h1>
        <p class="lead mb-5" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);">
            Explore the Corps, their emotional spectrums, and the heroes and villains who define them.
        </p>

        <!-- Buttons Section -->
        <div class="row w-75">
            <div class="col-md-12 mb-4">
                <a href="index.php" class="btn btn-light btn-lg w-50">Home</a>
            </div>
            <div class="col-md-4">
                <a href="corps.php" class="btn btn-outline-light btn-lg w-100 mb-3">Explore Corps</a>
            </div>
            <div class="col-md-4">
                <a href="notable_lanterns.php" class="btn btn-outline-light btn-lg w-100 mb-3">Notable Lanterns</a>
            </div>
            <div class="col-md-4">
                <a href="about.php" class="btn btn-outline-light btn-lg w-100 mb-3">About the Project</a>
            </div>
        </div>
    </div>

</div>

<!-- Footer -->
<?php include "view-footer.php"; ?>
