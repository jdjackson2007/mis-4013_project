<?php
require_once 'model-finding-the-comics.php';

try {
    $comicSources = getComicSources(); // Fetch comic sources
} catch (Exception $e) {
    die("Error loading comic sources: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finding the Comics</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Animate.css for Fun Animations -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .comic-card {
            background-color: #1f1f1f;
            border: 1px solid #333;
            border-radius: 8px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .comic-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }
        .comic-card .card-body {
            color: #fff;
        }
        .comic-card .card-title {
            font-size: 1.5rem;
        }
        .btn-custom {
            background-color: #ffd700;
            color: #000;
        }
        .btn-custom:hover {
            background-color: #ffa500;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <!-- Title Section -->
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4 text-warning animate__animated animate__bounceInDown">
                <i class="fas fa-book"></i> Finding the Comics
            </h1>
            <p class="lead text-muted">Explore the best sources for comics, collectibles, and memorabilia.</p>
        </div>
    </div>

    <!-- Comic Sources Section -->
    <div class="row">
        <?php foreach ($comicSources as $source) { ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card comic-card h-100 animate__animated animate__fadeInUp">
                <div class="card-body">
                    <h3 class="card-title text-warning"><?php echo htmlspecialchars($source['name']); ?></h3>
                    <p class="card-text"><?php echo htmlspecialchars($source['description']); ?></p>
                    <a href="<?php echo htmlspecialchars($source['url']); ?>" target="_blank" class="btn btn-custom">
                        Visit <i class="fas fa-external-link-alt"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Footer Section -->
<footer class="text-center mt-5">
    <p>&copy; <?php echo date('Y'); ?> Comics Universe. Powered by <i class="fas fa-lightbulb text-warning"></i> Imagination and <i class="fas fa-ring text-warning"></i> Collectors.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<!-- Animate.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script>
    // Add fun GSAP animations
    document.addEventListener('DOMContentLoaded', () => {
        gsap.from(".comic-card", { 
            duration: 1, 
            opacity: 0, 
            y: 50, 
            stagger: 0.3, 
            ease: "power2.out" 
        });
    });
</script>
</body>
</html>
