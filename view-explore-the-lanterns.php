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
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Tippy.js CSS for Tooltips -->
    <link href="https://unpkg.com/tippy.js@6/dist/tippy.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .lantern-card {
            background-color: #1f1f1f;
            border: 1px solid #333;
            border-radius: 8px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .lantern-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }
        .lantern-card .card-body {
            color: #fff;
        }
        .lantern-card .card-title {
            font-size: 1.5rem;
        }
        .text-warning {
            font-weight: bold;
        }
        .tooltip-style {
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            font-size: 0.9rem;
            border-radius: 4px;
        }
        footer {
            background-color: #1f1f1f;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        footer a {
            color: #ffd700;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <!-- Title Section -->
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4 text-warning"><i class="fas fa-ring"></i> Explore the Lanterns</h1>
            <p class="lead">Meet the legendary Lanterns from across the universe.</p>
        </div>
    </div>

    <!-- Lanterns Section -->
    <div class="row">
        <?php while ($lantern = $lanternsList->fetch_assoc()) { ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card lantern-card h-100">
                <div class="card-body">
                    <h3 class="card-title text-warning" data-tippy-content="<?php echo htmlspecialchars($lantern['bio'] ?: 'No bio available'); ?>">
                        <?php echo htmlspecialchars($lantern['name']); ?>
                    </h3>
                    <p><strong>Alias:</strong> <?php echo htmlspecialchars($lantern['alias'] ?: 'Unknown'); ?></p>
                    <p><strong>Corps:</strong> <?php echo htmlspecialchars($lantern['corps_name'] ?: 'Unknown Corps'); ?></p>
                    <p><strong>Earth Version:</strong> <?php echo ht
