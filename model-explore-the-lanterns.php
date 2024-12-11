<?php
require_once 'util-db.php'; // Include database connection utility

/**
 * Fetch all Lantern data with required joins
 * 
 * @return mysqli_result The result set containing Lantern data
 * @throws Exception if the query fails
 */
function getLanternsData() {
    try {
        $conn = get_db_connection(); // Get the database connection

        // SQL query to fetch Lantern data, ordered by Lantern Corps
        $query = "
            SELECT 
                l.Lantern_Name, 
                l.Lantern_Description, 
                l.Lantern_Sector, 
                c.Corps_Name AS Lantern_Corps, 
                c.CorpsColor_Name AS Lantern_Color
            FROM lanterns_table l
            LEFT JOIN corps_table c ON l.Corps_ID = c.Corps_ID
            ORDER BY c.Corps_Name
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
            throw new Exception("No Lanterns data found in the database.");
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
        throw new Exception("Error fetching Lanterns data: " . $e->getMessage());
    }
}
?>
