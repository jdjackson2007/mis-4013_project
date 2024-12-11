<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore the Lantern Corps</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-image: url('https://wallpapercave.com/wp/wp7379073.jpg');
            background-size: cover;
            background-attachment: fixed;
            color: #fff;
        }
        .header-image {
            width: 50px;
            height: auto;
        }
        .lantern-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
        .lantern-card .card-body {
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
        }
        .lantern-card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <!-- Title Section -->
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4 text-warning">
                <img src="https://th.bing.com/th/id/R.1c38180d23e00ef0098ee4c73e5db26f?rik=8FS2UBhhPyEBaA&riu=http%3a%2f%2fwww.writeups.org%2fwp-content%2fuploads%2fGreen-Lantern-Hal-Jordan-DC-Comics-h3.jpg&ehk=nADg%2bltkYCzhaxR9YQCOQVrWiR%2fhht%2bW1xrxDp0%2fdOE%3d&risl=&pid=ImgRaw&r=0"
                     alt="Green Lantern Ring" class="header-image">
                Explore the Lantern Corps
            </h1>
            <p class="lead">Discover the power, colors, and oaths of each Corps.</p>
        </div>
    </div>

    <!-- Corps Section -->
    <div class="row">
       <?php
while ($corps = $corpsList->fetch_assoc()) { 
    // Define background images for each Corps
    $backgrounds = [
        'Green Lantern Corps' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/66a83b6c-e211-4afb-b88a-5f4700f49d57/da6dfqj-d92d9f74-331a-4a8a-b286-df8b3748e7f4.jpg',
        'Sinestro Lantern Corps' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/66a83b6c-e211-4afb-b88a-5f4700f49d57/da6deur-997df727-4538-4375-82ba-a743017873fa.jpg',
        'Red Lantern Corps' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/66a83b6c-e211-4afb-b88a-5f4700f49d57/da6dc5w-90f39292-92d8-4486-a909-27b6d5479d6c.jpg',
        'Blue Lantern Corps' => 'https://www.desktopbackground.org/download/800x600/2012/09/05/447873_blue-lantern-corps-wallpapers-by-laffler-on-deviantart_1024x647_h.jpg',
        'Indigo Tribe' => 'https://img00.deviantart.net/56e9/i/2014/085/f/b/indigo_tribe_wallpaper_by_laffler-d7bomvh.jpg',
        'Star Sapphire Corps' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/66a83b6c-e211-4afb-b88a-5f4700f49d57/d7bommh-a7327852-5959-47a1-9ffd-e0cf5f3e0fdd.jpg/v1/fill/w_1024,h_647,q_75,strp/star_sapphire_corps_wallpaper_by_laffler_d7bommh-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NjQ3IiwicGF0aCI6IlwvZlwvNjZhODNiNmMtZTIxMS00YWZiLWI4OGEtNWY0NzAwZjQ5ZDU3XC9kN2JvbW1oLWE3MzI3ODUyLTU5NTktNDdhMS05ZmZkLWUwY2Y1ZjNlMGZkZC5qcGciLCJ3aWR0aCI6Ijw9MTAyNCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.cC3nkhX_MXkzYa2m_3EEglQsxeNZ3gQSNZHJhNYdriA',
        'Orange Lantern Corps' => 'https://www.desktopbackground.org/download/800x600/2015/12/15/1057780_orange-lantern-corps-wallpapers-by-laffler-on-deviantart_1024x647_h.jpg',
        'Black Lantern Corps' => 'https://www.desktopbackground.org/p/2014/09/10/822692_black-lantern-corps-wallpapers-by-laffler-on-deviantart_1024x647_h.jpg',
        'White Lantern Corps' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/66a83b6c-e211-4afb-b88a-5f4700f49d57/da6dctl-a77e4109-3a8c-4102-b5a1-cc03b7c8ab8c.jpg',
    ];

    // Assign a manual background for Sinestro Corps if needed
    if ($corps['Corps_Name'] === 'Sinestro Lantern Corps') {
        $backgroundImage = 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/66a83b6c-e211-4afb-b88a-5f4700f49d57/da6deur-997df727-4538-4375-82ba-a743017873fa.jpg'; // Manual override
    } else {
        $backgroundImage = $backgrounds[$corps['Corps_Name']] ?? 'https://via.placeholder.com/1200x600.png?text=Lantern+Corps';
    }
?>
<div class="col-md-6 mb-4">
    <div class="card lantern-card">
        <img src="<?php echo htmlspecialchars($backgroundImage); ?>" class="card-img-top" alt="Lantern Corps Symbol">
        <div class="card-body">
            <h3 class="card-title text-warning"><?php echo htmlspecialchars($corps['Corps_Name']); ?></h3>
            <p><strong>Color:</strong> <?php echo htmlspecialchars($corps['CorpsColor_Name']); ?></p>
            <p><strong>Emotion:</strong> <?php echo htmlspecialchars($corps['CorpsEmotion_Name']); ?></p>
            <p><strong>HQ Planet:</strong> <?php echo htmlspecialchars($corps['CorpsHQ_Planet']); ?></p>
            <p><strong>HQ Sector:</strong> <?php echo htmlspecialchars($corps['CorpsHQ_Sector']); ?></p>
            <p><strong>Sector Description:</strong> <?php echo htmlspecialchars($corps['CorpsHQSector_Description']); ?></p>
            <p><strong>Oath:</strong> <blockquote><?php echo nl2br(htmlspecialchars($corps['Corps_Oath'])); ?></blockquote></p>
            <p><strong>Description:</strong> <?php echo htmlspecialchars($corps['Corps_Description']); ?></p>
        </div>
    </div>
</div>
<?php } ?>

    </div>
</div>

<footer class="text-center mt-5">
    <p>&copy; <?php echo date('Y'); ?> Lantern Corps Database</p>
    <div id="ring-animation" style="width: 100px; margin: 0 auto;"></div>
    <p>Driven by imagination and willpower</p>
</footer>

<!-- Lottie Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.9.6/lottie.min.js"></script>

<!-- Lottie Animation Script -->
<script>
    lottie.loadAnimation({
        container: document.getElementById('ring-animation'), // Target element
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: 'https://assets2.lottiefiles.com/packages/lf20_b6l7ahcz.json' // Replace with a Green Lantern-style animation
    });
</script>
