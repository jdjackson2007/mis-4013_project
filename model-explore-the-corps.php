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
            ?>
                <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-light">
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
