<?php
// index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lantern Corps Universe</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        body {
            background-image: url('https://th.bing.com/th/id/R.e7a7d74b77f547f3f54a1bd578c7278d?rik=%2fjEgpfKtDsQbLw&riu=http%3a%2f%2fgetwallpapers.com%2fwallpaper%2ffull%2fc%2f1%2f4%2f158778.jpg&ehk=rH5NtfUZsipTvGOyVB21RezugJpk4r3REVjB4uHocWU%3d&risl=&pid=ImgRaw&r=0');
            background-size: 100% 100%; /* Ensures it fits the screen */
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        main {
            flex: 1; /* Ensures main content takes up remaining space */
        }
        .container {
            margin-top: 20px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
        }
        .button-group .btn {
            margin: 10px;
        }
        footer {
            background-color: rgba(0, 0, 0, 0.8);
            text-align: center;
            padding: 10px;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php include 'view-header.php'; ?>
    <main>
        <div class="container text-center">
            <h3>Welcome to the Lantern Corps Universe!</h3>
            <p>Dive into the rich history of the Lantern Corps, explore notable Lanterns, and find your favorite comics.</p>
            <div class="button-group">
                <a href="explore-the-corps.php" class="btn btn-primary">Explore the Corps</a>
                <a href="explore-the-lanterns.php" class="btn btn-success">Explore the Lanterns</a>
                <a href="view-finding-the-comics.php" class="btn btn-warning">Finding the Comics</a>
            </div>
        </div>
    </main>
    <?php include 'view-footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
