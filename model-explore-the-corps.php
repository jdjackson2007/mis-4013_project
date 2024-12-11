<?php
require_once 'util-db.php'; // Include the database connection utility

/**
 * Fetch all Corps data with required joins
 * 
 * @return mysqli_result The result set containing Corps data
 * @throws Exception if the query fails
 */
function getCorpsData() {
    try {
        $conn = get_db_connection(); // Get the database connection

        // SQL query to fetch all Corps details
        $query = "
            SELECT 
                c.Corps_ID, 
                c.Corps_Name, 
                cc.CorpsColor_Name, 
                ce.CorpsEmotion_Name, 
                ch.CorpsHQ_Planet, 
                ch.CorpsHQ_Sector, 
                cs.CorpsHQSector_Description, 
                c.Corps_Description, 
                c.Corps_Oath
            FROM 
                corps_table c
            LEFT JOIN 
                corpscolor_table cc ON c.CorpsColor_ID = cc.CorpsColor_ID
            LEFT JOIN 
                corpsemotion_table ce ON c.CorpsEmotion_ID = ce.CorpsEmotion_ID
            LEFT JOIN 
                corpshq_table ch ON c.CorpsHQ_ID = ch.CorpsHQ_ID
            LEFT JOIN 
                corpssectors_table cs ON ch.CorpsHQ_ID = cs.CorpsHQ_ID
            ORDER BY 
                c.Corps_Name;
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
            throw new Exception("No Corps data found in the database.");
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
