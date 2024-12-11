<?php
require_once 'model-explore-the-lanterns.php'; // Include the model

try {
    $lanternsList = getLanternsData(); // Fetch Lantern data
} catch (Exception $e) {
    die($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore the Lanterns</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://wallpapercave.com/wp/wp7379073.jpg');
            background-size: cover;
            background-attachment: fixed;
            color: #fff;
        }
        .lantern-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
        .lantern-card .card-body {
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Lantern Corps Universe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="explore-the-corps.php">Explore the Corps</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Explore the Lanterns</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Finding the Comics</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
    <!-- Title Section -->
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4 text-warning">Explore the Lanterns</h1>
            <p class="lead">Meet the heroes and villains of the Lantern Corps universe.</p>
        </div>
    </div>

    <!-- Lanterns Section -->
    <div class="row">
        <?php while ($lantern = $lanternsList->fetch_assoc()) { ?>
        <div class="col-md-6 mb-4">
            <div class="card lantern-card">
                <div class="card-body">
                    <h3 class="card-title text-warning"><?php echo htmlspecialchars($lantern['Lantern_Name']); ?></h3>
                    <p><strong>Corps:</strong> <?php echo htmlspecialchars($lantern['Lantern_Corps']); ?></p>
                    <p><strong>Color:</strong> <?php echo htmlspecialchars($lantern['Lantern_Color']); ?></p>
                    <p><strong>Sector:</strong> <?php echo htmlspecialchars($lantern['Lantern_Sector']); ?></p>
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($lantern['Lantern_Description']); ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<footer class="text-center mt-5">
    <p>&copy; <?php echo date('Y'); ?> Lantern Corps Database</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
