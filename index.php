<?php
$pageTitle = "Lantern Corps Home";
?>

<!-- Full-page container with background -->
<div class="container-fluid text-center text-white" style="background-image: url('https://3.bp.blogspot.com/-UbPydZyEqig/USxPpJVNBJI/AAAAAAAAE_Q/oKj7rgMDbzg/s1600/Lantern_Corps_Spectrum_by_tytemp1980.jpg'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">

    <!-- Header Section -->
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
        
        <!-- Home Button with Halved Letters -->
        <div class="text-center mb-4">
            <a href="index.php" class="btn btn-lg split-btn w-75">
                <span style="display: block; font-size: 24px;">HOME</span>
                <span style="display: block; font-size: 16px;">HOME</span>
            </a>
        </div>

        <!-- Navigation Buttons Section -->
        <div class="row w-75">
            <div class="col-md-4">
                <a href="corps.php" class="btn btn-warning btn-lg w-100 mb-3">Explore Corps</a> <!-- Yellow button -->
            </div>
            <div class="col-md-4">
                <a href="notable_lanterns.php" class="btn btn-light btn-lg w-100 mb-3">Notable Lanterns</a> <!-- White button -->
            </div>
            <div class="col-md-4">
                <a href="about.php" class="btn btn-indigo btn-lg w-100 mb-3" style="background-color: indigo; color: white;">About the Project</a> <!-- Indigo button -->
            </div>
        </div>
    </div>
</div>

<!-- Additional CSS for Styling -->
<style>
    body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }
    .split-btn {
        color: white;
        background-color: black;
        text-align: center;
        text-transform: uppercase;
        padding: 20px;
        border: none;
        position: relative;
    }
    .split-btn span:first-child {
        margin-bottom: 10px;
    }
    .split-btn:hover {
        background-color: gray;
        color: white;
    }
</style>
ome Button -->
<style>
    .split-btn {
        position: relative;
        color: white;
        background-color: black;
        overflow: hidden;
        text-transform: uppercase;
    }

    .split-btn::before {
        content: "";
        position: absolute;
        top: 50%; /* Split halfway */
        left: 0;
        width: 100%;
        height: 50%;
        background-color: white; /* Bottom half */
        z-index: 1;
    }

    .split-btn span {
        position: relative;
        display: block;
        z-index: 2;
    }

    .split-btn span:nth-child(1) {
        color: white; /* Top half text */
    }

    .split-btn span:nth-child(2) {
        color: black; /* Bottom half text */
    }

    /* Adjust button hover effect */
    .split-btn:hover {
        background-color: gray;
    }

    .split-btn:hover::before {
        background-color: lightgray;
    }
</style>
