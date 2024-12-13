<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finding the Comics</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .comic {
            border-bottom: 1px solid #ddd;
            margin-bottom: 15px;
            padding-bottom: 15px;
        }
        .comic:last-child {
            border-bottom: none;
        }
        .comic-title {
            font-size: 1.5em;
            font-weight: bold;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Finding the Comics</h1>

        <?php if (!empty($comicsList)) { ?>
            <?php foreach ($comicsList as $comic) { ?>
                <div class="comic">
                    <div class="comic-title"> <?php echo htmlspecialchars($comic['Comics_Title']); ?> </div>
                    <p> <?php echo htmlspecialchars($comic['Comics_Description']); ?> </p>
                    <p><strong>Seller:</strong> <?php echo htmlspecialchars($comic['Comics_Seller']); ?></p>
                    <p><strong>Price:</strong> <?php echo htmlspecialchars(is_numeric($comic['Comics_Price']) ? '$' . number_format($comic['Comics_Price'], 2) : $comic['Comics_Price']); ?></p>
                    <?php if (!empty($comic['Comics_Rating']) && $comic['Comics_Rating'] !== 'N/A') { ?>
                        <p><strong>Rating:</strong> <?php echo htmlspecialchars($comic['Comics_Rating']); ?></p>
                    <?php } ?>
                    <p><a href="<?php echo htmlspecialchars($comic['Comics_URL']); ?>" target="_blank">More Info</a></p>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>No comics available at the moment. Please check back later!</p>
        <?php } ?>
    </div>

    <footer>
        &copy; <?php echo date('Y'); ?> Finding the Comics. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
