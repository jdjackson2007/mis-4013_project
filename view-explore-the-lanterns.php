<?php
require_once 'model-explore-the-lanterns.php';

try {
    $lanternsList = getLanternsData(); // Fetch Lantern data
} catch (Exception $e) {
    die("Error loading Lantern data: " . $e->getMessage());
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
            background-color: #121212;
            color: #fff;
        }
        .lantern-card {
            background-color: #1f1f1f;
            border: none;
            border-radius: 8px;
        }
        .lantern-card .card-body {
            color: #fff;
        }
        .text-warning {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <!-- Title Section -->
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4 text-warning">Explore the Lanterns</h1>
            <p class="lead">Meet the legendary Lanterns from across the universe.</p>
        </div>
    </div>

    <!-- Lanterns Section -->
    <div class="row">
        <?php while ($lantern = $lanternsList->fetch_assoc()) { ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card lantern-card h-100">
                <div class="card-body">
                    <h3 class="card-title text-warning"><?php echo htmlspecialchars($lantern['name']); ?></h3>
                    <p><strong>Alias:</strong> <?php echo htmlspecialchars($lantern['alias'] ?: 'Unknown'); ?></p>
                    <p><strong>Corps:</strong> <?php echo htmlspecialchars($lantern['corps_name'] ?: 'Unknown Corps'); ?></p>
                    <p><strong>Earth Version:</strong> <?php echo htmlspecialchars($lantern['earth_version'] ?: 'None'); ?></p>
                    <p><strong>First Appearance:</strong> <?php echo htmlspecialchars($lantern['first_appearance'] ?: 'Unknown'); ?></p>
                    <p><strong>Status:</strong> <?php echo htmlspecialchars($lantern['status'] ?: 'Active'); ?></p>
                    <p><strong>Classes:</strong> <?php echo htmlspecialchars($lantern['classes'] ?: 'None'); ?></p>
                    <p><strong>Bio:</strong> <?php echo htmlspecialchars($lantern['bio'] ?: 'No bio available'); ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
