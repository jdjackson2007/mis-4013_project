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
            $seenCorps = []; // Track displayed Corps
            while ($corps = $corpsList->fetch_assoc()):
                // Skip duplicates
                if (in_array($corps['Corps_Name'], $seenCorps)) {
                    continue;
                }
                $seenCorps[] = $corps['Corps_Name'];
            ?>
                <div class="col-md-6 mb-4 corps-card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="corps-name"><?php echo htmlspecialchars($corps['Corps_Name']); ?></h5>
                            <div class="corps-details">
                                <p><span class="label">Color:</span> <?php echo htmlspecialchars($corps['CorpsColor_Name']); ?></p>
                                <p><span class="label">Emotion:</span> <?php echo htmlspecialchars($corps['CorpsEmotion_Name']); ?></p>
                                <p><span class="label">Description:</span> <?php echo htmlspecialchars($corps['Corps_Description']); ?></p>
                                <p><span class="label">HQ Planet:</span> <?php echo htmlspecialchars($corps['CorpsHQ_Planet']); ?></p>
                                <p><span class="label">HQ Sector:</span> <?php echo htmlspecialchars($corps['CorpsHQ_Sector']); ?></p>
                                <p><span class="label">Sector Number:</span> <?php echo htmlspecialchars($corps['CorpsSectors_SectorNumber']); ?></p>
                                <p><span class="label">Sector Description:</span> <?php echo htmlspecialchars($corps['CorpsSectors_Description']); ?></p>
                            </div>
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
