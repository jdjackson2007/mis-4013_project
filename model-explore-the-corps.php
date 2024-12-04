<?php
require_once 'view-header.php'; // Include the header for consistency
?>

<div class="container">
    <!-- Title Section -->
    <div class="row">
        <div class="col">
            <h1 class="text-center text-warning">Lantern Corps</h1>
            <p class="text-center">Explore the details of the Corps, their colors, emotions, and more.</p>
        </div>
    </div>

    <!-- Table Section -->
    <div class="row mt-4">
        <div class="col">
            <div class="table-section bg-dark p-4 rounded">
                <h2 class="text-warning">Corps Details</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-dark">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Color</th>
                                <th>Emotion</th>
                                <th>Description</th>
                                <th>HQ Planet</th>
                                <th>HQ Sector</th>
                                <th>Sector Number</th>
                                <th>Sector Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $seenCorps = []; // To track duplicate corps
                            while ($corps = $corpsList->fetch_assoc()):
                                // Skip duplicates
                                if (in_array($corps['Corps_Name'], $seenCorps)) {
                                    continue;
                                }
                                $seenCorps[] = $corps['Corps_Name'];
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($corps['Corps_Name']); ?></td>
                                    <td><?php echo htmlspecialchars($corps['CorpsColor_Name']); ?></td>
                                    <td><?php echo htmlspecialchars($corps['CorpsEmotion_Name']); ?></td>
                                    <td><?php echo htmlspecialchars($corps['Corps_Description']); ?></td>
                                    <td><?php echo htmlspecialchars($corps['CorpsHQ_Planet']); ?></td>
                                    <td><?php echo htmlspecialchars($corps['CorpsHQ_Sector']); ?></td>
                                    <td><?php echo htmlspecialchars($corps['CorpsSectors_SectorNumber']); ?></td>
                                    <td><?php echo htmlspecialchars($corps['CorpsSectors_Description']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Oath Section -->
    <div class="row mt-5">
        <div class="col">
            <h2 class="text-warning">Oaths</h2>
            <div class="row">
                <?php
                // Reset the pointer for oaths
                $corpsList->data_seek(0);
                while ($corps = $corpsList->fetch_assoc()):
                    // Skip duplicates for oaths
                    if (isset($seenCorps[$corps['Corps_Name'] . '_oath'])) {
                        continue;
                    }
                    $seenCorps[$corps['Corps_Name'] . '_oath'] = true;
                ?>
                    <div class="col-md-6 mb-4">
                        <div class="card bg-dark text-light">
                            <div class="card-body">
                                <h5 class="card-title text-warning"><?php echo htmlspecialchars($corps['Corps_Name']); ?> Oath</h5>
                                <p class="card-text"><?php echo htmlspecialchars($corps['Corps_Oath']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'view-footer.php'; // Include the footer
?>
