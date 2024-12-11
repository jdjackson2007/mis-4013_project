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
    <!-- Custom CSS -->
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease;
        }
        .lantern-card:hover {
            transform: translateY(-10px);
        }
        .lantern-card .card-body {
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
        }
        .text-glow {
            text-shadow: 0 0 5px #fff, 0 0 10px #ffd700, 0 0 15px #ffd700;
        }
        .navbar {
            background: rgba(0, 0, 0, 0.9);
        }
        .scrollable-section {
            max-height: 80vh;
            overflow-y: auto;
        }
        footer {
            background: rgba(0, 0, 0, 0.9);
            color: #fff;
            padding: 20px 0;
        }
    </style>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-glow" href="#"><i class="fas fa-ring"></i> Lantern Corps Universe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="explore-the-corps.php"><i class="fas fa-lightbulb"></i> Explore the Corps</a></li>
                <li class="nav-item"><a class="nav-link active" href="#"><i class="fas fa-user-circle"></i> Explore the Lanterns</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-book"></i> Finding the Comics</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
    <!-- Title Section -->
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4 text-warning text-glow">Explore the Lanterns</h1>
            <p class="lead">Meet the heroes and villains of the Lantern Corps universe.</p>
        </div>
    </div>

    <!-- Lanterns Section -->
    <div class="row scrollable-section">
        <?php while ($lantern = $lanternsList->fetch_assoc()) { ?>
        <div class="col-md-6 col-lg-4 mb-4">
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

<footer class="text-center">
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> Lantern Corps Database</p>
        <p>Powered by <i class="fas fa-lightbulb text-warning"></i> Imagination and <i class="fas fa-ring text-warning"></i> Willpower</p>
        <div id="ring-animation" style="width: 100px; margin: 0 auto;"></div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<!-- Lottie Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.9.6/lottie.min.js"></script>
<!-- Lottie Animation Script -->
<script>
    lottie.loadAnimation({
        container: document.getElementById('ring-animation'),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: 'https://assets2.lottiefiles.com/packages/lf20_b6l7ahcz.json'
    });
</script>
</body>
</html>
