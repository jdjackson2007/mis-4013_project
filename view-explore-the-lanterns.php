<div class="container my-5">
    <!-- Title Section -->
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4 text-warning">Explore the Lanterns</h1>
            <p class="lead">Meet the legendary Lanterns from across the universe.</p>
        </div>
    </div>

    <!-- Lanterns Section -->
    <div class="row">
        <?php while ($lantern = $lanternsList->fetch_assoc()) { ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card lantern-card h-100">
                <div class="card-body">
                    <h3 class="card-title text-warning" data-tippy-content="<?php echo htmlspecialchars($lantern['bio']); ?>">
                        <?php echo htmlspecialchars($lantern['name']); ?>
                    </h3>
                    <p><strong>Alias:</strong> <?php echo htmlspecialchars($lantern['alias'] ?: 'Unknown'); ?></p>
                    <p><strong>Corps:</strong> <?php echo htmlspecialchars($lantern['corps']); ?></p>
                    <p><strong>Colors:</strong> <?php echo htmlspecialchars($lantern['colors']); ?></p>
                    <p><strong>Emotions:</strong> <?php echo htmlspecialchars($lantern['emotions']); ?></p>
                    <p><strong>First Appearance:</strong> <?php echo htmlspecialchars($lantern['first_appearance']); ?></p>
                    <p><strong>Status:</strong> <?php echo htmlspecialchars($lantern['status']); ?></p>
                    <p><strong>Class:</strong> <?php echo htmlspecialchars($lantern['classes'] ?: 'N/A'); ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Tippy.js -->
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>
<script>
    // Initialize Tippy.js tooltips
    document.addEventListener('DOMContentLoaded', () => {
        tippy('[data-tippy-content]', {
            animation: 'scale',
            theme: 'light',
        });
    });
</script>

