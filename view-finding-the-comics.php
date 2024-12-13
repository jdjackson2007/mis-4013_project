<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finding the Comics</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .card {
            margin-bottom: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #333;
            color: white;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Lantern Corps Universe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Explore the Corps</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">The Lanterns</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Finding the Comics</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h1 class="text-center mb-4">Find the Comics</h1>
        <div class="row">
            <?php
            require_once 'model-finding-the-comics.php';

            // Fetch comics data from the database
            $comicsList = getComicsFromDatabase();

            if (!empty($comicsList)) {
                foreach ($comicsList as $comic) {
                    ?>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x200.png?text=Comic+Cover" class="card-img-top" alt="Comic Cover">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($comic['Comics_Title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($comic['Comics_Description']); ?></p>
                                <p><strong>Seller:</strong> <?php echo htmlspecialchars($comic['Comics_Seller']); ?></p>
                                <p><strong>Price:</strong> $<?php echo number_format($comic['Comics_Price'], 2); ?></p>
                                <p><strong>Rating:</strong> <?php echo htmlspecialchars($comic['Comics_Rating'] ?? 'N/A'); ?></p>
                                <a href="<?php echo htmlspecialchars($comic['Comics_URL']); ?>" class="btn btn-primary" target="_blank">View Comic</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                // Display a fallback message if no comics are found
                echo "<p class='text-center'>No comics available at the moment. Please check back later!</p>";
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Lantern Corps Universe. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
