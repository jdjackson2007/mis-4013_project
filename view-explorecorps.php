<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Lantern Corps</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Lantern Corps</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pages
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php">Home</a></li>
                        <li><a class="dropdown-item" href="explorecorps.php">Explore Corps</a></li>
                        <li><a class="dropdown-item" href="notable_lanterns.php">Notable Lanterns</a></li>
                        <li><a class="dropdown-item" href="about.php">About</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
    <h1 class="text-center mb-4">Explore the Lantern Corps</h1>

    <!-- Add Corps Button -->
    <div class="text-end mb-4">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCorpsModal">
            Add Lantern Corps
        </button>
    </div>

    <!-- Lantern Corps Cards -->
    <div class="row">
        <?php
        // Query for fetching Lantern Corps data
        $query = "
            SELECT 
                corps.Corps_Name,
                corps.Corps_Description,
                emotions.Emotion_Name AS CorpsEmotion,
                headquarters.HQ_Name AS CorpsHQ
            FROM 
                Corps corps
            JOIN 
                Emotions emotions ON corps.CorpsEmotion_ID = emotions.Emotion_ID
            JOIN 
                Headquarters headquarters ON corps.CorpsHQ_ID = headquarters.HQ_ID
        ";
        $result = $db->query($query);

        if ($result->num_rows > 0):
            while ($corps = $result->fetch_assoc()):
        ?>
        <div class="col-md-4 mb-4">
            <div class="card text-center bg-light">
                <div class="card-body">
                    <h5 class="card-title text-dark"><?php echo htmlspecialchars($corps['Corps_Name']); ?></h5>
                    <p class="card-text text-dark">
                        Emotion: <?php echo htmlspecialchars($corps['CorpsEmotion']); ?><br>
                        Headquarters: <?php echo htmlspecialchars($corps['CorpsHQ']); ?><br>
                        <?php echo htmlspecialchars($corps['Corps_Description']); ?>
                    </p>
                </div>
            </div>
        </div>
        <?php endwhile; else: ?>
        <p class="text-center">No Lantern Corps available. Add a new Corps using the button above.</p>
        <?php endif; ?>
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
                        <input type="text" class="form-control" id="corpsName" name="corpsName" required maxlength="255">
                    </div>
                    <div class="mb-3">
                        <label for="corpsEmotion" class="form-label">Emotion</label>
                        <select class="form-select" id="corpsEmotion" name="corpsEmotion" required>
                            <option value="1">Willpower</option>
                            <option value="2">Fear</option>
                            <!-- Add more options dynamically -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="corpsHQ" class="form-label">Headquarters</label>
                        <select class="form-select" id="corpsHQ" name="corpsHQ" required>
                            <option value="1">Oa</option>
                            <option value="2">Qward</option>
                            <!-- Add more options dynamically -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="corpsDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="corpsDescription" name="corpsDescription" rows="3" required></textarea>
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
