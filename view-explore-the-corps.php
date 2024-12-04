<?php
// view-explore-the-corps.php

function renderCorpsView($corpsList)
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Explore the Corps</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #1c1c1c;
                color: #f5f5f5;
                font-family: 'Arial', sans-serif;
            }
            .container {
                margin-top: 50px;
            }
            .table-hover tbody tr:hover {
                background-color: rgba(255, 255, 255, 0.1);
            }
            .header-section {
                margin-bottom: 30px;
                text-align: center;
            }
            .header-section h1 {
                color: #ffc107;
            }
            .table-section {
                background-color: rgba(0, 0, 0, 0.7);
                padding: 20px;
                border-radius: 10px;
            }
            .oath-section {
                margin-top: 20px;
            }
            .oath-box {
                background-color: rgba(255, 255, 255, 0.1);
                padding: 20px;
                border-radius: 10px;
                color: #ffc107;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Header Section -->
            <div class="header-section">
                <h1>Lantern Corps</h1>
                <p>Explore the details of the Corps, their colors, emotions, and more.</p>
            </div>

            <!-- Table Section -->
            <div class="row">
                <div class="col">
                    <div class="table-section">
                        <h2>Corps Details</h2>
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
                                    <?php while ($corps = $corpsList->fetch_assoc()): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($corps['Corps_Name']); ?></td>
                                            <td><?= htmlspecialchars($corps['CorpsColor_Name']); ?></td>
                                            <td><?= htmlspecialchars($corps['CorpsEmotion_Name']); ?></td>
                                            <td><?= htmlspecialchars($corps['Corps_Description']); ?></td>
                                            <td><?= htmlspecialchars($corps['CorpsHQ_Planet']); ?></td>
                                            <td><?= htmlspecialchars($corps['CorpsHQ_Sector']); ?></td>
                                            <td><?= htmlspecialchars($corps['CorpsSectors_SectorNumber']); ?></td>
                                            <td><?= htmlspecialchars($corps['CorpsSectors_Description']); ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Oath Section -->
            <div class="row oath-section">
                <div class="col">
                    <h2>Oaths</h2>
                    <div class="oath-box">
                        <?php while ($corps = $corpsList->fetch_assoc()): ?>
                            <p><strong><?= htmlspecialchars($corps['Corps_Name']); ?> Oath:</strong> <?= htmlspecialchars($corps['Corps_Oath']); ?></p>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
}
?>
