<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore the Lantern Corps</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-dark text-light">

<div class="container my-5">
    <!-- Title Section -->
    <div class="row">
        <div class="col text-center">
            <h1 class="display-4 text-warning"><i class="fas fa-ring"></i> Explore the Lantern Corps</h1>
            <p class="lead">Discover the details of each Corps, their colors, emotions, and oaths.</p>
        </div>
    </div>

    <!-- Table Section -->
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table id="corpsTable" class="table table-striped table-hover table-dark align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Corps Name</th>
                            <th>Color</th>
                            <th>Emotion</th>
                            <th>HQ Planet</th>
                            <th>HQ Sector</th>
                            <th>Sector Description</th>
                            <th>Oath</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($corps = $corpsList->fetch_assoc()) { 
                            // Override HQ Planet and Sector Description for specific Corps
                            $hqPlanet = $corps['CorpsHQ_Planet'];
                            $sectorDescription = $corps['CorpsHQSector_Description'];
                            if ($corps['Corps_Name'] === 'Sinestro Lantern Corps') {
                                $hqPlanet = 'Qward';
                                $sectorDescription = 'Qward';
                            } elseif ($corps['Corps_Name'] === 'Indigo Tribe') {
                                $hqPlanet = 'Nok';
                                $sectorDescription = 'Nok';
                            }
                        ?>
                        <tr>
                            <td><?php echo $corps['Corps_ID']; ?></td>
                            <td><span class="badge bg-primary"><?php echo $corps['Corps_Name']; ?></span></td>
                            <td><span class="badge" style="background-color: <?php echo htmlspecialchars($corps['CorpsColor_Name']); ?>;"><?php echo $corps['CorpsColor_Name']; ?></span></td>
                            <td><?php echo $corps['CorpsEmotion_Name']; ?></td>
                            <td><?php echo $hqPlanet; ?></td>
                            <td><?php echo $corps['CorpsHQ_Sector']; ?></td>
                            <td><?php echo $sectorDescription; ?></td>
                            <td><?php echo nl2br(htmlspecialchars($corps['Corps_Oath'])); ?></td>
                            <td><?php echo $corps['Corps_Description']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center mt-5">
    <p>&copy; <?php echo date('Y'); ?> Lantern Corps Database | Built with <i class="fas fa-heart text-danger"></i> and <i class="fas fa-ring text-warning"></i></p>
</footer>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#corpsTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            pageLength: 5,
            lengthChange: false
        });
    });
</script>

</body>
</html>
