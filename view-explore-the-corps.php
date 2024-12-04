<?php
// view-explore-the-corps.php

function renderCorpsView($corpsList)
{
    // Convert result set to an array for reuse in multiple sections
    $corpsArray = [];
    while ($corps = $corpsList->fetch_assoc()) {
        $corpsArray[] = $corps;
    }

    // Start output buffer to construct the HTML via PHP
    ob_start();
    ?>
    <div class="container">
        <!-- Header Section -->
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
                                <?php foreach ($corpsArray as $corps): ?>
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
                                <?php endforeach; ?>
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
                <div class="oath-box bg-secondary p-4 rounded">
                    <?php foreach ($corpsArray as $corps): ?>
                        <p><strong class="text-warning"><?php echo htmlspecialchars($corps['Corps_Name']); ?> Oath:</strong> <?php echo htmlspecialchars($corps['Corps_Oath']); ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    // Output the buffered content
    echo ob_get_clean();
}
?>
