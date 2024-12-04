<?php
require_once 'util-db.php'; // Include the database connection utility

/**
 * Fetch all Lantern Corps data with required joins
 * 
 * @return mysqli_result The result set containing Corps data
 * @throws Exception if the query fails
 */
function getCorpsData() {
    try {
        $conn = get_db_connection(); // Get the database connection

        // SQL query to fetch data from all relevant tables
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

        // Prepare and execute the query
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            throw new Exception("Failed to prepare SQL statement: " . $conn->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        // If no data is found, throw an exception
        if ($result->num_rows === 0) {
            throw new Exception("No data found in the database.");
        }

        // Close the connection and return the result set
        $conn->close();
        return $result;

    } catch (Exception $e) {
        // Close the connection if it exists
        if (isset($conn) && $conn->ping()) {
            $conn->close();
        }
        // Re-throw the exception with a meaningful message
        throw new Exception("Error fetching Corps data: " . $e->getMessage());
    }
}
?>
