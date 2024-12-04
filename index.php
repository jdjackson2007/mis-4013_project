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
        body {
            background-image: url('https://th.bing.com/th/id/OIP.OUilLZt65eM_eE_tGw9H2AHaB9?rs=1&pid=ImgDetMain');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
            margin-top: 20px;
            text-align: center;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php include 'view-header.php'; ?>
    <div class="container text-center">
        <h3>Welcome to the Lantern Corps Universe!</h3>
        <p>Dive into the rich history of the Lantern Corps, explore notable Lanterns, and find your favorite comics.</p>
        <div class="button-group">
            <a href="explore_corps.php" class="btn btn-primary">Explore the Corps</a>
            <a href="lanterns.php" class="btn btn-success">The Lanterns</a>
            <a href="finding_the_comics.php" class="btn btn-warning">Finding the Comics</a>
        </div>
    </div>
    <?php include 'view-footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
