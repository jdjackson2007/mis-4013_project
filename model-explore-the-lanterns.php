<?php
require_once 'util-db.php'; // Include the database connection utility

/**
 * Fetch all Lantern data, including Corps name and classes
 * 
 * @return mysqli_result The result set containing Lantern data
 * @throws Exception if the query fails
 */
function getLanternsData() {
    try {
        $conn = get_db_connection(); // Get the database connection

        // Corrected SQL query
        $query = "
            SELECT 
                nl.NotableLanterns_Name AS name,
                GROUP_CONCAT(DISTINCT c.Corps_Name) AS corps_name,
                GROUP_CONCAT(DISTINCT nl.NotableLanterns_EarthVersion) AS earth_version,
                GROUP_CONCAT(DISTINCT nl.NotableLanterns_Alias) AS alias,
                GROUP_CONCAT(DISTINCT nl.NotableLanterns_Bio) AS bio,
                GROUP_CONCAT(DISTINCT nl.NotableLanterns_FirstAppearance) AS first_appearance,
                GROUP_CONCAT(DISTINCT nl.NotableLanterns_Status) AS status,
                GROUP_CONCAT(DISTINCT lsc.LanternsSpecialClasses_ClassName) AS classes
            FROM 
                notablelanterns_table nl
            LEFT JOIN 
                corps_table c ON nl.Corps_ID = c.Corps_ID
            LEFT JOIN 
                lanternclasses_table lc ON nl.NotableLanterns_ID = lc.NotableLanterns_ID
            LEFT JOIN 
                lanternspecialclasses_table lsc ON lc.SpecialClasses_ID = lsc.LanternSpecialClasses_ID
            GROUP BY 
                nl.NotableLanterns_Name
            ORDER BY 
                nl.NotableLanterns_Name;
        ";

        // Execute the query
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
