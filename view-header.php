<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? "Lantern Corps"; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        /* Full-page background */
        .home-background {
            background-image: url('https://3.bp.blogspot.com/-UbPydZyEqig/USxPpJVNBJI/AAAAAAAAE_Q/oKj7rgMDbzg/s1600/Lantern_Corps_Spectrum_by_tytemp1980.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            background-color: #000; /* Fallback color */
        }
    </style>
</head>
<body class="bg-dark text-white">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" aria-label="Lantern Corps Home">Lantern Corps</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Open Pages Menu">
                        Pages
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php" aria-label="Home">Home</a></li>
                        <li><a class="dropdown-item" href="explorecorps.php" aria-label="Explore Lantern Corps">Explore Corps</a></li>
                        <li><a class="dropdown-item" href="notable_lanterns.php" aria-label="Notable Lanterns">Notable Lanterns</a></li>
                        <li><a class="dropdown-item" href="about.php" aria-label="About the Project">About</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-QFIMzO4cAHR5FZjN1q0q5w9Iv2lU+jNKaWhb7UNQtbZkJpR0m0sAh6Lzq4RSaUda" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rlc0QzH2cPVG6CUpOBFYUBH1uOdMYTlfNsHNBEd6TKhK/n0LYDxUHOau4ugWQpHt" crossorigin="anonymous"></script>
</body>
</html>
