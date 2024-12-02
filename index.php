<?php
$pageTitle = "Lantern Corps Home";
include "view-header.php";
?>

<div class="container mt-4">
    <!-- Header Section -->
    <div class="text-center">
        <h1 class="display-4">Lantern Corps Database</h1>
        <p class="lead">Explore the Corps, their emotional spectrums, and the heroes and villains who define them.</p>
    </div>

    <!-- Image Section -->
    <div class="text-center my-4">
        <img src="https://3.bp.blogspot.com/-UbPydZyEqig/USxPpJVNBJI/AAAAAAAAE_Q/oKj7rgMDbzg/s1600/Lantern_Corps_Spectrum_by_tytemp1980.jpg" 
             class="img-fluid rounded" 
             alt="Lantern Corps Spectrum">
    </div>

    <!-- Navigation Links -->
    <div class="row mt-5 text-center">
        <div class="col-md-4">
            <a href="corps.php" class="btn btn-outline-success btn-lg w-100 mb-3">Explore Corps</a>
        </div>
        <div class="col-md-4">
            <a href="notable_lanterns.php" class="btn btn-outline-primary btn-lg w-100 mb-3">Notable Lanterns</a>
        </div>
        <div class="col-md-4">
            <a href="about.php" class="btn btn-outline-info btn-lg w-100 mb-3">About the Project</a>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include "view-footer.php"; ?>

