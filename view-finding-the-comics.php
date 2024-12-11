<?php
require_once 'model-finding-the-comics.php';

$comicsList = getComicsFromDatabase(); // Fetch all comics
$premiumComics = getPremiumComicsFromDatabase(); // Fetch premium comics
?>

<div class="container my-5">
    <h1 class="text-center text-warning">Find the Comics</h1>
    
    <!-- All Comics Section -->
    <h2 class="my-4">All Comics</h2>
    <div class="row">
        <?php foreach ($comicsList as $comic): ?>
        <div class="col-md-4">
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($comic['Comics_Title']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($comic['Comics_Description']); ?></p>
                    <p><strong>Seller:</strong> <?php echo htmlspecialchars($comic['Comics_Seller']); ?></p>
                    <p><strong>Price:</strong> $<?php echo htmlspecialchars(number_format($comic['Comics_Price'], 2)); ?></p>
                    <p><strong>Rating:</strong> <?php echo htmlspecialchars($comic['Comics_Rating'] ?? 'N/A'); ?></p>
                    <a href="<?php echo htmlspecialchars($comic['Comics_URL']); ?>" target="_blank" class="btn btn-primary">View Comic</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Premium Comics Section -->
    <h2 class="my-4">Premium Comics (Over $10,000)</h2>
    <div class="row">
        <?php foreach ($premiumComics as $comic): ?>
        <div class="col-md-4">
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($comic['Comics_Title']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($comic['Comics_Description']); ?></p>
                    <p><strong>Seller:</strong> <?php echo htmlspecialchars($comic['Comics_Seller']); ?></p>
                    <p><strong>Price:</strong> $<?php echo htmlspecialchars(number_format($comic['Comics_Price'], 2)); ?></p>
                    <p><strong>Rating:</strong> <?php echo htmlspecialchars($comic['Comics_Rating'] ?? 'N/A'); ?></p>
                    <a href="<?php echo htmlspecialchars($comic['Comics_URL']); ?>" target="_blank" class="btn btn-primary">View Comic</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

