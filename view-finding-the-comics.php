<?php
require_once 'model-finding-the-comics.php';

$comicsList = getComicsFromDatabase(); // Fetch comics from the database
?>

<div class="container">
    <h1 class="text-center text-warning my-5">Find the Comics</h1>
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
</div>
