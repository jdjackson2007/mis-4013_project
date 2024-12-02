<?php
$pageTitle = "Lantern Corps Home";
include "view-header.php";
?>

<!-- Full-page container with background -->
<div class="container-fluid text-center text-white" style="background-image: url('https://3.bp.blogspot.com/-UbPydZyEqig/USxPpJVNBJI/AAAAAAAAE_Q/oKj7rgMDbzg/s1600/Lantern_Corps_Spectrum_by_tytemp1980.jpg'); background-size: cover; background-position: center; height: 100vh;">

    <!-- Buttons Section -->
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">

        <!-- Home Button -->
        <div class="text-center mb-4 w-75">
            <a href="index.php" class="btn btn-light btn-lg w-100 text-dark">Home</a> <!-- Full-width button -->
        </div>

        <!-- Navigation Buttons Section -->
        <div class="row w-75">
            <div class="col-md-4">
                <a href="corps.php" class="btn btn-warning btn-lg w-100 mb-3">Explore Corps</a> <!-- Yellow button -->
            </div>
            <div class="col-md-4">
                <a href="notable_lanterns.php" class="btn btn-light btn-lg w-100 mb-3 text-dark">Notable Lanterns</a> <!-- White button -->
            </div>
            <div class="col-md-4">
                <a href="about.php" class="btn btn-indigo btn-lg w-100 mb-3" style="background-color: indigo; color: white;">About the Project</a> <!-- Indigo button -->
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include "view-footer.php"; ?>
