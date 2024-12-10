<?php if ($corpsList->num_rows > 0): ?>
    <div class="container">
        <!-- Title Section -->
        <div class="row">
            <div class="col">
                <header class="bg-dark py-5 text-center text-white">
                    <h1 class="display-4 text-warning">Lantern Corps</h1>
                    <p class="lead">Explore the details of the Corps, their colors, emotions, and oaths.</p>
                </header>
            </div>
        </div>

        <!-- Corps Section -->
        <div class="row mt-4">
            <?php
            while ($corps = $corpsList->fetch_assoc()):
                // Define URLs for background images
                $backgroundUrls = [
                    // Add background URLs for each Corps here
                ];

                // Get the background URL or a default image
                $backgroundUrl = $backgroundUrls[$corps['Corps_Name']] ?? 'https://via.placeholder.com/1200x600.png?text=Lantern+Corps';
            ?>
                <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-light" style="background-image: url('<?php echo htmlspecialchars($backgroundUrl); ?>'); background-size: cover; background-position: center; color: white; border-radius: 10px; overflow: hidden;">
                        <div class="card-body" style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
                            <h5 class="card-title text-warning"><?php echo htmlspecialchars($corps['Corps_Name']); ?></h5>
                            <p><strong>Color:</strong> <?php echo htmlspecialchars($corps['CorpsColor_Name']); ?></p>
                            <p><strong>Emotion:</strong> <?php echo htmlspecialchars($corps['CorpsEmotion_Name']); ?></p>
                            <p><strong>Description:</strong> <?php echo htmlspecialchars($corps['Corps_Description']); ?></p>
                            <p><strong>HQ Planet:</strong> <?php echo htmlspecialchars($corps['CorpsHQ_Planet']); ?></p>
                            <p><strong>HQ Sector:</strong> <?php echo htmlspecialchars($corps['CorpsHQ_Sector']); ?></p>
                            <p><strong>Sector Number:</strong> <?php echo htmlspecialchars($corps['CorpsSectors_SectorNumber']); ?></p>
                            <p><strong>Sector Description:</strong> <?php echo htmlspecialchars($corps['CorpsSectors_Description']); ?></p>
                            <hr>
                            <p><strong>Oath:</strong></p>
                            <blockquote class="blockquote text-warning">
                                <p><?php echo nl2br(htmlspecialchars($corps['Corps_Oath'])); ?></p>
                            </blockquote>
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
