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
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .comic {
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
            padding-bottom: 15px;
        }
        .comic:last-child {
            border-bottom: none;
        }
        .comic-title {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #333;
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
                    <div class="comic-title"><?php echo htmlspecialchars($comic['title']); ?></div>
                    <p><?php echo htmlspecialchars($comic['description']); ?></p>
                    <?php if (!empty($comic['details'])) { ?>
                        <ul>
                            <?php foreach ($comic['details'] as $detail) { ?>
                                <li><?php echo htmlspecialchars($detail); ?></li>
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
        &copy; <?php echo date('Y'); ?> Lantern Corps Universe. All rights reserved. |
        <a href="https://www.dcuniverseinfinite.com" target="_blank">Visit DC Comics</a>
    </footer>
</body>
</html>
