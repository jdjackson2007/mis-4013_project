<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore the Lanterns</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #111;
            color: #fff;
        }
        .card {
            background-color: #222;
            color: #fff;
            border: none;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .navbar {
            background-color: #000;
        }
        footer {
            background-color: #000;
            color: #fff;
            padding: 15px 0;
        }
        .text-highlight {
            color: #ffd700;
        }
    </style>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-highlight" href="#"><i class="fas fa-ring"></i> Lantern Corps Universe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="explore-the-corps.php"><i class="fas fa-lightbulb"></i> Explore the Corps</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fas fa-user-circle"></i> Explore the Lanterns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-book"></i> Finding the Comics</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4 text-highlight">Explore the Lanterns</h1>
            <p class="lead">Discover the characters of the Lantern Corps and their stories.</p>
        </div>
    </div>

    <div class="row">
        <?php while ($lantern = $lanternsList->fetch_assoc()) { ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-highlight"><?php echo htmlspecialchars($lantern['Lantern_Name']); ?></h5>
                        <p class="card-text"><strong>Corps:</strong> <?php echo htmlspecialchars($lantern['Lantern_Corps']); ?></p>
                        <p class="card-text"><strong>Color:</strong> <?php echo htmlspecialchars($lantern['Lantern_Color']); ?></p>
                        <p class="card-text"><strong>Sector:</strong> <?php echo htmlspecialchars($lantern['Lantern_Sector']); ?></p>
                        <p class="card-text"><strong>Description:</strong> <?php echo htmlspecialchars($lantern['Lantern_Description']); ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<footer class="text-center">
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> Lantern Corps Universe. All rights reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
