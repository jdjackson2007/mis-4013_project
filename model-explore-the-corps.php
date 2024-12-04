<?php
require_once "util-db.php"; // Ensure database connection utility is included

// Function to fetch Corps data with all required joins
function getCorpsData() {
    try {
        $conn = get_db_connection(); // Get the database connection

        $query = "
            SELECT 
                c.Corps_ID, c.Corps_Name, c.Corps_Description, c.Corps_Oath,
                cc.CorpsColor_Name, ce.CorpsEmotion_Name, 
                chq.CorpsHQ_Planet, chq.CorpsHQ_Sector,
                cs.CorpsSectors_SectorNumber, cs.CorpsSectors_Description
            FROM corps_table c
            LEFT JOIN corpscolor_table cc ON c.CorpsColor_ID = cc.CorpsColor_ID
            LEFT JOIN corpsemotion_table ce ON c.CorpsEmotion_ID = ce.CorpsEmotion_ID
            LEFT JOIN corpshq_table chq ON c.CorpsHQ_ID = chq.CorpsHQ_ID
            LEFT JOIN corpssectors_table cs ON chq.CorpsHQ_Sector = cs.CorpsSectors_SectorNumber
        ";

        $stmt = $conn->prepare($query); // Prepare the SQL statement
        $stmt->execute(); // Execute the statement
        $result = $stmt->get_result(); // Fetch the result set
        $conn->close(); // Close the connection

        return $result; // Return the result set
    } catch (Exception $e) {
        if (isset($conn)) {
            $conn->close(); // Ensure the connection is closed
        }
        throw new Exception("Error fetching Corps data: " . $e->getMessage());
    }
}
?>
