<?php
require_once 'util-db.php'; // Include the database connection utility

/**
 * Fetch all Lantern data with relevant joins
 * 
 * @return mysqli_result The result set containing Lantern data
 * @throws Exception if the query fails
 */
function getLanternsData() {
    try {
        $conn = get_db_connection(); // Get the database connection

        // SQL query to fetch Lantern details and their relationships
        $query = "
            SELECT 
                nl.NotableLanterns_ID,
                nl.NotableLanterns_Name,
                nl.NotableLanterns_EarthVersion,
                nl.NotableLanterns_Alias,
                nl.NotableLanterns_Bio,
                nl.NotableLanterns_FirstAppearance,
                nl.NotableLanterns_Status,
                nl.NotableLanterns_MultipleCorps,
                c.Corps_Name AS Lantern_Corps,
                cc.CorpsColor_Name AS Lantern_Color,
                ce.CorpsEmotion_Name AS Lantern_Emotion,
                ch.CorpsHQ_Planet,
                ch.CorpsHQ_Sector,
                cs.CorpsHQSector_Description,
                lsc.LanternsSpecialClasses_ClassName AS Lantern_Class,
                lsc.LanternSpecialClasses_Description AS Class_Description
            FROM notablelanterns_table nl
            LEFT JOIN corps_table c ON nl.Corps_ID = c.Corps_ID
            LEFT JOIN corpscolor_table cc ON c.CorpsColor_ID = cc.CorpsColor_ID
            LEFT JOIN corpsemotion_table ce ON c.CorpsEmotion_ID = ce.CorpsEmotion_ID
            LEFT JOIN corpshq_table ch ON c.CorpsHQ_ID = ch.CorpsHQ_ID
            LEFT JOIN corpssectors_table cs ON ch.CorpsHQ_ID = cs.CorpsHQ_ID
            LEFT JOIN lanternclasses_table lc ON nl.NotableLanterns_ID = lc.NotableLanterns_ID
            LEFT JOIN lanternspecialclasses_table lsc ON lc.SpecialClasses_ID = lsc.LanternSpecialClasses_ID
            ORDER BY nl.NotableLanterns_Name, c.Corps_Name
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
            throw new Exception("No Lantern data found in the database.");
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
        throw new Exception("Error fetching Lantern data: " . $e->getMessage());
    }
}
?>
