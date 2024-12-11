<div class="container my-5">
    <!-- Title Section -->
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4 text-warning">Explore the Lanterns</h1>
            <p class="lead">Meet the heroes and villains of the Lantern Corps Universe.</p>
        </div>
    </div>

    <!-- Lanterns Section -->
    <div class="row">
        <?php while ($lantern = $lanternsList->fetch_assoc()) { ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card lantern-card h-100">
                <div class="card-body">
                    <h3 class="card-title text-warning"><?php echo htmlspecialchars($lantern['NotableLanterns_Name']); ?></h3>
                    <p><strong>Alias:</strong> <?php echo htmlspecialchars($lantern['NotableLanterns_Alias'] ?: 'Unknown'); ?></p>
                    <p><strong>Corps:</strong> <?php echo htmlspecialchars($lantern['Lantern_Corps']); ?></p>
                    <p><strong>Color:</strong> <?php echo htmlspecialchars($lantern['Lantern_Color']); ?></p>
                    <p><strong>Emotion:</strong> <?php echo htmlspecialchars($lantern['Lantern_Emotion']); ?></p>
                    <p><strong>First Appearance:</strong> <?php echo htmlspecialchars($lantern['NotableLanterns_FirstAppearance']); ?></p>
                    <p><strong>Status:</strong> <?php echo htmlspecialchars($lantern['NotableLanterns_Status']); ?></p>
                    <p><strong>Class:</strong> <?php echo htmlspecialchars($lantern['Lantern_Class'] ?: 'N/A'); ?></p>
                    <p><strong>Class Description:</strong> <?php echo htmlspecialchars($lantern['Class_Description'] ?: 'N/A'); ?></p>
                    <p><strong>Bio:</strong> <?php echo nl2br(htmlspecialchars($lantern['NotableLanterns_Bio'])); ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
