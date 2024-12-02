<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Lantern Corps</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">

<div class="container my-5">
    <h1 class="text-center mb-4">Explore the Lantern Corps</h1>

    <!-- Add Corps Button -->
    <div class="text-end mb-4">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCorpsModal">Add Lantern Corps</button>
    </div>

    <!-- Lantern Corps Cards -->
    <div class="row">
        <?php foreach ($corpsData as $corps): ?>
            <div class="col-md-4 mb-4">
                <div class="card text-center bg-light">
                    <img src="<?php echo htmlspecialchars($corps['Corps_Image_URL']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($corps['Corps_Name']); ?>">
                    <div class="card-body">
                        <h5 class="card-title text-dark"><?php echo htmlspecialchars($corps['Corps_Name']); ?></h5>
                        <p class="card-text text-dark">
                            Emotion: <?php echo htmlspecialchars($corps['CorpsEmotion_ID']); ?><br>
                            Headquarters: <?php echo htmlspecialchars($corps['CorpsHQ_ID']); ?><br>
                            <?php echo htmlspecialchars($corps['Corps_Description']); ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Add Corps Modal -->
<div class="modal fade" id="addCorpsModal" tabindex="-1" aria-labelledby="addCorpsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="add_corps.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCorpsModalLabel">Add New Corps</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="corpsName" class="form-label">Corps Name</label>
                        <input type="text" class="form-control" id="corpsName" name="corpsName" required>
                    </div>
                    <div class="mb-3">
                        <label for="corpsEmotion" class="form-label">Emotion</label>
                        <input type="text" class="form-control" id="corpsEmotion" name="corpsEmotion" required>
                    </div>
                    <div class="mb-3">
                        <label for="corpsHQ" class="form-label">Headquarters</label>
                        <input type="text" class="form-control" id="corpsHQ" name="corpsHQ" required>
                    </div>
                    <div class="mb-3">
                        <label for="corpsDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="corpsDescription" name="corpsDescription" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="corpsImage" class="form-label">Image URL</label>
                        <input type="url" class="form-control" id="corpsImage" name="corpsImage" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Corps</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
