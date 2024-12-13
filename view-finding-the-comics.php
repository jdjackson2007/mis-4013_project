<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finding the Comics</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&display=swap');

        body {
            font-family: Arial, sans-serif;
            background: url('https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1582317527i/24395239.jpg') no-repeat center center fixed;
            background-size: 100% 100%;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 20px auto;
            max-width: 900px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }
        .comic {
            margin-bottom: 20px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            transition: 0.3s ease;
        }
        .comic:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }
        h1 {
            font-family: 'Comic Neue', cursive;
            font-size: 2.5em;
            color: #007bff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        footer {
            text-align: center;
            padding: 10px;
            background: rgba(0, 0, 0, 0.8);
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
                    <?php if ($comic['title'] === 'Understanding Comic Grading') { ?>
                        <p style="margin-top: 15px; font-size: 0.9em;">
                            The CGC grading system rates comics from 0.5 (Poor) to 10.0 (Gem Mint). Key factors include cover quality, page preservation, and structural integrity. Higher grades can significantly increase the value of collectible comics, making professional grading essential for serious collectors.
                        </p>
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
