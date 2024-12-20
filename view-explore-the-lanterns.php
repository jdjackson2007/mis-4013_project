<?php
require_once 'model-explore-the-lanterns.php';

try {
    $lanternsList = getLanternsData(); 
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
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://geekscovery.com/wp-content/uploads/2020/05/lantern-corps-970x545-1.jpg');
            background-size: cover;
            background-attachment: fixed;
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
        .lantern-card img {
            height: 200px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }
        .lantern-card .card-body {
            color: #fff;
        }
        .lantern-card .card-title {
            font-size: 1.5rem;
        }
        h1.display-4 {
            color: #ffd700; 
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8); 
        }
        p.lead {
            color: #ffa500; 
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8); 
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
    
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4">
                <img src="https://www.nealadamsstore.com/assets/images/unnamed-1.jpg" 
                     alt="Green Lantern Ring" style="height: 50px; margin-right: 10px;"> 
                Explore the Lanterns
            </h1>
            <p class="lead">Meet the legendary Lanterns from across the universe.</p>
        </div>
    </div>

    
    <div class="row">
        <?php 
        $backgrounds = [
            'Green Lantern Corps' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/66a83b6c-e211-4afb-b88a-5f4700f49d57/da6dfqj-d92d9f74-331a-4a8a-b286-df8b3748e7f4.jpg',
            'Sinestro Corps' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/66a83b6c-e211-4afb-b88a-5f4700f49d57/da6deur-997df727-4538-4375-82ba-a743017873fa.jpg',
            'Red Lantern Corps' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/66a83b6c-e211-4afb-b88a-5f4700f49d57/da6dc5w-90f39292-92d8-4486-a909-27b6d5479d6c.jpg',
            'Blue Lantern Corps' => 'https://www.desktopbackground.org/download/800x600/2012/09/05/447873_blue-lantern-corps-wallpapers-by-laffler-on-deviantart_1024x647_h.jpg',
            'Indigo Tribe' => 'https://img00.deviantart.net/56e9/i/2014/085/f/b/indigo_tribe_wallpaper_by_laffler-d7bomvh.jpg',
            'Star Sapphire Corps' => 'http://pre01.deviantart.net/a8cb/th/pre/f/2016/166/0/8/star_sapphires_wallpapers_by_laffler-da6dawc.jpg',
            'Orange Lantern Corps' => 'https://www.desktopbackground.org/download/800x600/2015/12/15/1057780_orange-lantern-corps-wallpapers-by-laffler-on-deviantart_1024x647_h.jpg',
            'Black Lantern Corps' => 'https://www.desktopbackground.org/p/2014/09/10/822692_black-lantern-corps-wallpapers-by-laffler-on-deviantart_1024x647_h.jpg',
            'White Lantern Corps' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/66a83b6c-e211-4afb-b88a-5f4700f49d57/da6dctl-a77e4109-3a8c-4102-b5a1-cc03b7c8ab8c.jpg',
        ];

        while ($lantern = $lanternsList->fetch_assoc()) { 
            $corpsList = explode(',', $lantern['corps_name']);
            $primaryCorps = trim($corpsList[0]);
            $backgroundImage = $backgrounds[$primaryCorps] ?? 'https://via.placeholder.com/1200x600.png?text=Lantern+Corps';
        ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card lantern-card h-100">
                <img src="<?php echo htmlspecialchars($backgroundImage); ?>" class="card-img-top" alt="Lantern Corps Symbol">
                <div class="card-body">
                    <h3 class="card-title text-warning"><?php echo htmlspecialchars($lantern['name']); ?></h3>
                    <p><strong>Alias:</strong> <?php echo htmlspecialchars($lantern['alias'] ?: 'Unknown'); ?></p>
                    <p><strong>Corps:</strong> <?php echo htmlspecialchars($lantern['corps_name'] ?: 'Unknown Corps'); ?></p>
                    <p><strong>Bio:</strong> <?php echo htmlspecialchars($lantern['bio'] ?: 'No bio available.'); ?></p>
                    <p><strong>First Appearance:</strong> <?php echo htmlspecialchars($lantern['first_appearance'] ?: 'Unknown'); ?></p>
                    <p><strong>Status:</strong> <?php echo htmlspecialchars($lantern['status'] ?: 'Active'); ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>


<footer>
    <p>&copy; <?php echo date('Y'); ?> Lantern Corps Universe. Powered by <i class="fas fa-lightbulb text-warning"></i> Imagination and <i class="fas fa-code text-success"></i> Code.</p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
