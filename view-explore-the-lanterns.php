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
                    
                    <!-- Display Multiple Corps -->
                    <p><strong>Corps:</strong></p>
                    <ul>
                        <?php 
                        $corps = explode(',', $lantern['corps']); // Split corps by commas
                        foreach ($corps as $corp) { ?>
                            <li><?php echo htmlspecialchars(trim($corp)); ?></li>
                        <?php } ?>
                    </ul>

                    <!-- Colors -->
                    <p><strong>Colors:</strong></p>
                    <ul>
                        <?php 
                        $colors = explode(',', $lantern['colors']); // Split colors by commas
                        foreach ($colors as $color) { ?>
                            <li><?php echo htmlspecialchars(trim($color)); ?></li>
                        <?php } ?>
                    </ul>

                    <!-- Emotions -->
                    <p><strong>Emotions:</strong></p>
                    <ul>
                        <?php 
                        $emotions = explode(',', $lantern['emotions']); // Split emotions by commas
                        foreach ($emotions as $emotion) { ?>
                            <li><?php echo htmlspecialchars(trim($emotion)); ?></li>
                        <?php } ?>
                    </ul>

                    <p><strong>First Appearance:</strong> <?php echo htmlspecialchars($lantern['first_appearance']); ?></p>
                    <p><strong>Status:</strong> <?php echo htmlspecialchars($lantern['status']); ?></p>
                    
                    <!-- Classes -->
                    <p><strong>Class:</strong></p>
                    <ul>
                        <?php 
                        $classes = explode(',', $lantern['classes']); // Split classes by commas
                        foreach ($classes as $class) { ?>
                            <li><?php echo htmlspecialchars(trim($class)); ?></li>
                        <?php } ?>
                    </ul>
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
