<?php if ($corpsList->num_rows > 0): ?>
    <div class="container">
        <!-- Title Section -->

        <!-- Corps Section -->
        <div class="row mt-4">
            <?php
            $displayedCorps = []; // To track and avoid duplicates
            
            while ($corps = $corpsList->fetch_assoc()):
                // Skip duplicates
                if (in_array($corps['Corps_Name'], $displayedCorps)) {
                    continue;
                }
                $displayedCorps[] = $corps['Corps_Name'];

                // Define URLs for background images
                $backgroundUrls = [
                    'Green Lantern Corps' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/66a83b6c-e211-4afb-b88a-5f4700f49d57/da6dfqj-d92d9f74-331a-4a8a-b286-df8b3748e7f4.jpg',
                    'Blue Lantern Corps' => 'https://th.bing.com/th/id/OIP.NohAtyMIZ1DrDpUtzuCzqwHaEr?rs=1&pid=ImgDetMain',
                    'Red Lantern Corps' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/66a83b6c-e211-4afb-b88a-5f4700f49d57/da6dc5w-90f39292-92d8-4486-a909-27b6d5479d6c.jpg',
                    'Orange Lantern Corps' => 'https://www.desktopbackground.org/download/800x600/2015/12/15/1057780_orange-lantern-corps-wallpapers-by-laffler-on-deviantart_1024x647_h.jpg',
                    'Black Lantern Corps' => 'https://www.desktopbackground.org/p/2014/09/10/822692_black-lantern-corps-wallpapers-by-laffler-on-deviantart_1024x647_h.jpg',
                    'White Lantern Corps' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/66a83b6c-e211-4afb-b88a-5f4700f49d57/da6dctl-a77e4109-3a8c-4102-b5a1-cc03b7c8ab8c.jpg',
                    'Star Sapphire Corps' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/66a83b6c-e211-4afb-b88a-5f4700f49d57/d7bommh-a7327852-5959-47a1-9ffd-e0cf5f3e0fdd.jpg',
                    'Sinestro Lantern Corps' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/66a83b6c-e211-4afb-b88a-5f4700f49d57/da6deur-997df727-4538-4375-82ba-a743017873fa.jpg',
                    'Indigo Tribe' => 'https://img00.deviantart.net/56e9/i/2014/085/f/b/indigo_tribe_wallpaper_by_laffler-d7bomvh.jpg',
                ];

                // Normalize key lookup and apply fallback
                $backgroundKey = trim($corps['Corps_Name']);
                $backgroundUrl = $backgroundUrls[$backgroundKey] ?? 'https://via.placeholder.com/1200x600.png?text=Lantern+Corps';

                // Override Sector Description for Sinestro Lantern Corps
                $sectorDescription = trim($corps['CorpsSectors_Description']);
                if (strtolower($corps['Corps_Name']) === 'sinestro lantern corps') {
                    $sectorDescription = 'Qward';
                }
            ?>
                <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-light" style="background-image: url('<?php echo htmlspecialchars($backgroundUrl); ?>'); background-size: cover; background-position: center; color: white; border-radius: 10px; overflow: hidden;">
                        <div class="card-body" style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
                            <h3 class="card-title text-warning" style="font-size: 1.75rem; font-weight: bold;"><?php echo htmlspecialchars($corps['Corps_Name']); ?></h3>
                            <p><strong>Color:</strong> <?php echo htmlspecialchars($corps['CorpsColor_Name']); ?></p>
                            <p><strong>Emotion:</strong> <?php echo htmlspecialchars($corps['CorpsEmotion_Name']); ?></p>
                            <p><strong>Description:</strong> <?php echo htmlspecialchars($corps['Corps_Description']); ?></p>
                            <p><strong>HQ Planet:</strong> <?php echo htmlspecialchars($corps['CorpsHQ_Planet']); ?></p>
                            <p><strong>HQ Sector:</strong> <?php echo htmlspecialchars($corps['CorpsHQ_Sector']); ?></p>
                            <p><strong>Sector Number:</strong> <?php echo htmlspecialchars($corps['CorpsSectors_SectorNumber']); ?></p>
                            <p><strong>Sector Description:</strong> <?php echo htmlspecialchars($sectorDescription); ?></p>
                            <hr>
                            <p><strong>Oath:</strong></p>
                            <blockquote class="blockquote text-warning">
                                <p><?php echo nl2br(htmlspecialchars($corps['Corps_Oath'])); ?></p>
                            </blockquote>
                            <hr style="border-top: 1px solid rgba(255, 255, 255, 0.3);">
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
