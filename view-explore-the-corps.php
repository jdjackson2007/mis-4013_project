<?php if ($corpsList->num_rows > 0): ?>
    <div class="container">
        <!-- Title Section -->
        <div class="row">
            <div class="col">
                <h1 class="text-center text-warning">Lantern Corps</h1>
                <p class="text-center">Explore the details of the Corps, their colors, emotions, and more.</p>
            </div>
        </div>

        <!-- Corps Section -->
        <div class="row mt-4">
            <?php
            $seenCorps = []; // To track already displayed Corps
            while ($corps = $corpsList->fetch_assoc()):
                // Skip duplicates
                if (in_array($corps['Corps_Name'], $seenCorps)) {
                    continue;
                }
                $seenCorps[] = $corps['Corps_Name'];

                // Define URLs for emblems
                $emblemUrls = [
                    'Green Lantern Corps' => 'https://upload.wikimedia.org/wikipedia/en/thumb/a/a0/Green_Lantern_logo.svg/1200px-Green_Lantern_logo.svg.png',
                    'Sinestro Corps' => 'https://upload.wikimedia.org/wikipedia/en/thumb/5/5b/Sinestro_Corps_logo.svg/1200px-Sinestro_Corps_logo.svg.png',
                    'Blue Lantern Corps' => 'https://upload.wikimedia.org/wikipedia/en/thumb/1/10/Blue_Lantern_Corps_logo.svg/1200px-Blue_Lantern_Corps_logo.svg.png',
                    'Red Lantern Corps' => 'https://upload.wikimedia.org/wikipedia/en/thumb/d/d4/Red_Lantern_Corps_logo.svg/1200px-Red_Lantern_Corps_logo.svg.png',
                    'Indigo Tribe' => 'https://upload.wikimedia.org/wikipedia/en/thumb/a/a0/Indigo_Lantern_logo.svg/1200px-Indigo_Lantern_logo.svg.png',
                    'Star Sapphire Corps' => 'https://upload.wikimedia.org/wikipedia/en/thumb/7/77/Star_Sapphire_logo.svg/1200px-Star_Sapphire_logo.svg.png',
                    'Black Lantern Corps' => 'https://upload.wikimedia.org/wikipedia/en/thumb/a/a2/Black_Lantern_Corps_logo.svg/1200px-Black_Lantern_Corps_logo.svg.png',
                    'White Lantern Corps' => 'https://upload.wikimedia.org/wikipedia/en/thumb/f/ff/White_Lantern_Corps_logo.svg/1200px-White_Lantern_Corps_logo.svg.png',
                ];

                // Get the emblem URL or a default image
                $emblemUrl = $emblemUrls[$corps['Corps_Name']] ?? 'https://via.placeholder.com/1200x600.png?text=Lantern+Corps';
            ?>
                <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-light">
                        <div class="card-header p-0">
                            <img src="<?php echo htmlspecialchars($emblemUrl); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($corps['Corps_Name']); ?> Emblem" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-warning"><?php echo htmlspecialchars($corps['Corps_Name']); ?></h5>
                            <p><strong>Color:</strong> <?php echo htmlspecialchars($corps['CorpsColor_Name']); ?></p>
                            <p><strong>Emotion:</strong> <?php echo htmlspecialchars($corps['CorpsEmotion_Name']); ?></p>
                            <p><strong>Description:</strong> <?php echo htmlspecialchars($corps['Corps_Description']); ?></p>
                            <p><strong>HQ Planet:</strong> <?php echo htmlspecialchars($corps['CorpsHQ_Planet']); ?></p>
                            <p><strong>HQ Sector:</strong> <?php echo htmlspecialchars($corps['CorpsHQ_Sector']); ?></p>
                            <p><strong>Sector Number:</strong> <?php echo htmlspecialchars($corps['CorpsSectors_SectorNumber']); ?></p>
                            <p><strong>Sector Description:</strong> <?php echo htmlspecialchars($corps['CorpsSectors_Description']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php else: ?>
    <div class="container">
        <div class="alert alert-warning text-center mt-4">
            <p>No data found in the database.</p>
        </div>
    </div>
<?php endif; ?>
