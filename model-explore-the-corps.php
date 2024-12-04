<?php
// model-explore-the-corps.php

require_once 'util-db.php'; // Ensure util-db.php is included for the database connection

// Function to fetch Corps data with all required joins
function getCorpsData() {
    try {
        $conn = get_db_connection(); // Get the database connection

        // Prepare the SQL query
        $query = "
            SELECT 
                c.Corps_ID, 
                c.Corps_Name, 
                c.Corps_Description, 
                c.Corps_Oath,
                cc.CorpsColor_Name, 
                ce.CorpsEmotion_Name, 
                chq.CorpsHQ_Planet, 
                chq.CorpsHQ_Sector,
                cs.CorpsSectors_SectorNumber, 
                cs.CorpsSectors_Description
            FROM corps_table c
            LEFT JOIN corpscolor_table cc ON c.CorpsColor_ID = cc.CorpsColor_ID
            LEFT JOIN corpsemotion_table ce ON c.CorpsEmotion_ID = ce.CorpsEmotion_ID
            LEFT JOIN corpshq_table chq ON c.CorpsHQ_ID = chq.CorpsHQ_ID
            LEFT JOIN corpssectors_table cs ON chq.CorpsHQ_Sector = cs.CorpsSectors_SectorNumber
        ";

        // Prepare and execute the statement
        $stmt = $conn->prepare($query);
        $stmt->execute();

        // Fetch the result set
        $result = $stmt->get_result();

        // Close the connection
        $conn->close();

        return $result; // Return the result set
    } catch (Exception $e) {
        // Ensure connection is closed if it exists
        if (isset($conn) && $conn->ping()) {
            $conn->close();
        }
        throw new Exception("Error fetching Corps data: " . $e->getMessage());
    }
}
?>
