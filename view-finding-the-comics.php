<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finding the Comics</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 10px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .comic {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .comic-title {
            font-weight: bold;
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        .comic-description {
            margin-bottom: 10px;
        }
        .comic-meta {
            font-size: 0.9em;
            color: #555;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Finding the Comics</h1>

        <?php
        require_once 'model-finding-the-comics.php';

        // Fetch comics data
        $comicsList = getComicsFromDatabase();

        if (!empty($comicsList)) {
            foreach ($comicsList as $comic) {
                ?>
                <div class="comic">
                    <div class="comic-title"><?php echo htmlspecialchars($comic['Comics_Title']); ?></div>
                    <div class="comic-description"><?php echo htmlspecialchars($comic['Comics_Description']); ?></div>
                    <div class="comic-meta">
                        <p><strong>Seller:</strong> <?php echo htmlspecialchars($comic['Comics_Seller']); ?></p>
                        <p><strong>Price:</strong> $<?php echo number_format($comic['Comics_Price'], 2); ?></p>
                        <p><strong>Rating:</strong> <?php echo htmlspecialchars($comic['Comics_Rating'] ?? 'N/A'); ?></p>
                        <p><a href="<?php echo htmlspecialchars($comic['Comics_URL']); ?>" target="_blank">View Comic</a></p>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No comics available at the moment.</p>";
        }
        ?>
    </div>

    <footer>
        &copy; <?php echo date('Y'); ?> Lantern Corps Universe. All rights reserved.
    </footer>
</body>
</html>
