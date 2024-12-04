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
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="text-center">Explore the Corps</h1>
            <div class="mt-4">
                <h3>All Corps</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Emotion</th>
                            <th>Color</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($corpsList as $corps): ?>
                            <tr>
                                <td><?= htmlspecialchars($corps['Corps_ID']) ?></td>
                                <td><?= htmlspecialchars($corps['Corps_Name']) ?></td>
                                <td><?= htmlspecialchars($corps['Corps_Description']) ?></td>
                                <td><?= htmlspecialchars($corps['CorpsEmotion_ID']) ?></td>
                                <td><?= htmlspecialchars($corps['CorpsColor_ID']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                <h3>Add a New Corps</h3>
                <form method="POST" action="explore-the-corps.php">
                    <div class="mb-3">
                        <label for="corps_name" class="form-label">Corps Name</label>
                        <input type="text" class="form-control" id="corps_name" name="corps_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="corps_description" class="form-label">Description</label>
                        <textarea class="form-control" id="corps_description" name="corps_description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="corps_emotion" class="form-label">Emotion (ID)</label>
                        <input type="number" class="form-control" id="corps_emotion" name="corps_emotion" required>
                    </div>
                    <div class="mb-3">
                        <label for="corps_color" class="form-label">Color (ID)</label>
                        <input type="number" class="form-control" id="corps_color" name="corps_color" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Corps</button>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
}
