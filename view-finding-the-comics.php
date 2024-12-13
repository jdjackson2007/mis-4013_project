<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finding the Comics</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .comic {
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
            padding-bottom: 15px;
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .comic:hover {
            transform: scale(1.03);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }
        .comic:last-child {
            border-bottom: none;
        }
        .comic-title {
            font-size: 1.8em;
            font-weight: bold;
            margin-bottom: 10px;
            color: #007bff;
        }
        .comic-title:hover {
            text-decoration: underline;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            padding: 15px;
            background-color: #343a40;
            color: white;
        }
        footer a {
            color: #f8d347;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center animate__animated animate__fadeInDown">Finding the Comics</h1>

        <?php if (!empty($comicsList)) { ?>
            <?php foreach ($comicsList as $comic) { ?>
                <div class="comic">
                    <div class="comic-title animate__animated animate__zoomIn"> <?php echo htmlspecialchars($comic['title']); ?> </div>
                    <p><?php echo htmlspecialchars($comic['description']); ?></p>
                    <?php if (!empty($comic['details'])) { ?>
                        <ul>
                            <?php foreach ($comic['details'] as $detail) { ?>
                                <li>
                                    <a href="<?php echo htmlspecialchars($detail['url']); ?>" target="_blank" class="text-primary">
                                        <?php echo htmlspecialchars($detail['name']); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p class="text-center">No comics available at the moment. Please check back later!</p>
        <?php } ?>
    </div>

    <footer>
        &copy; <?php echo date('Y'); ?> Lantern Corps Universe. All rights reserved. |
        <a href="https://www.dcuniverseinfinite.com" target="_blank">Visit DC Comics</a>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Third-party JS for animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Add GSAP animations for comic entries
            gsap.from('.comic', {
                opacity: 0,
                y: 50,
                duration: 1,
                stagger: 0.3
            });

            // Fun hover animation for comic titles
            document.querySelectorAll('.comic-title').forEach(title => {
                title.addEventListener('mouseenter', () => {
                    gsap.to(title, { scale: 1.1, duration: 0.3 });
                });
                title.addEventListener('mouseleave', () => {
                    gsap.to(title, { scale: 1, duration: 0.3 });
                });
            });
        });
    </script>
</body>
</html>
