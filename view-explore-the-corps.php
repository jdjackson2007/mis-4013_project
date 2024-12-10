<div class="container">
  <!-- Title Section -->
  <div class="row">
    <div class="col">
      <h1 class="text-center">Explore the Lantern Corps</h1> <!-- Center the title -->
    </div>
  </div>

  <!-- Table Section -->
  <div class="row">
    <div class="col">
      <div class="table-responsive">
        <table class="table table-striped table-bordered"> <!-- Add Bootstrap styling for a striped and bordered table -->
          <thead>
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
              $sectorDescription = $corps['CorpsSectors_Description'];
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
              <td><?php echo $corps['Corps_Name']; ?></td>
              <td><?php echo $corps['CorpsColor_Name']; ?></td>
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
