<?php
require_once 'model-finding-the-comics.php';

$comicsList = getComicsData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finding the Comics</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9ecef;
        }
        .container {
            margin: 20px auto;
            max-width: 900px;
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .comic {
            margin-bottom: 20px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            transition: 0.3s ease;
        }
        .comic:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }
        footer {
            text-align: center;
            padding: 10px;
            background: #343a40;
            color: white;
        }
        footer a {
            color: #f8d347;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Finding the Comics</h1>
        <?php if (!empty($comicsList)) { ?>
            <?php foreach ($comicsList as $comic) { ?>
                <div class="comic">
                    <h2><?php echo htmlspecialchars($comic['title']); ?></h2>
                    <p><?php echo htmlspecialchars($comic['description']); ?></p>
                    <?php if (!empty($comic['details'])) { ?>
                        <ul>
                            <?php foreach ($comic['details'] as $detail) { ?>
                                <li>
                                    <a href="<?php echo htmlspecialchars($detail['url']); ?>" target="_blank">
                                        <?php echo htmlspecialchars($detail['name']); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>No comics available at the moment. Please check back later!</p>
        <?php } ?>
    </div>
    <footer>
        &copy; <?php echo date('Y'); ?> Lantern Corps Universe. All rights reserved.
    </footer>
</body>
</html>
