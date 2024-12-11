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
                    
                    <!-- Display Corps Membership -->
                    <p><strong>Primary Corps:</strong></p>
                    <ul>
                        <?php
                        $corps = explode(',', $lantern['corps']); // Split corps by commas
                        foreach ($corps as $index => $corp) {
                            if ($index === 0) {
                                // Highlight the first Corps
                                echo '<li><strong>' . htmlspecialchars(trim($corp)) . ' (Primary)</strong></li>';
                            } else {
                                echo '<li>' . htmlspecialchars(trim($corp)) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                    
                    <!-- Colors -->
                    <p><strong>Associated Colors:</strong></p>
                    <ul>
                        <?php
                        $colors = explode(',', $lantern['colors']);
                        foreach ($colors as $color) {
                            echo '<li>' . htmlspecialchars(trim($color)) . '</li>';
                        }
                        ?>
                    </ul>
                    
                    <!-- Emotions -->
                    <p><strong>Associated Emotions:</strong></p>
                    <ul>
                        <?php
                        $emotions = explode(',', $lantern['emotions']);
                        foreach ($emotions as $emotion) {
                            echo '<li>' . htmlspecialchars(trim($emotion)) . '</li>';
                        }
                        ?>
                    </ul>
                    
                    <p><strong>First Appearance:</strong> <?php echo htmlspecialchars($lantern['first_appearance'] ?: 'Unknown'); ?></p>
                    <p><strong>Status:</strong> <?php echo htmlspecialchars($lantern['status'] ?: 'Active'); ?></p>
                    
                    <!-- Classes -->
                    <p><strong>Special Classes:</strong></p>
                    <ul>
                        <?php
                        $classes = explode(',', $lantern['classes']);
                        foreach ($classes as $class) {
                            echo '<li>' . htmlspecialchars(trim($class)) . '</li>';
                        }
                        ?>
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
