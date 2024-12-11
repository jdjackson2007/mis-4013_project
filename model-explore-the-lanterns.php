<?php
require_once 'util-db.php'; // Include the database connection utility

/**
 * Fetch all Lantern data from notablelanterns_table
 * 
 * @return mysqli_result The result set containing Lantern data
 * @throws Exception if the query fails
 */
function getLanternsData() {
    try {
        $conn = get_db_connection(); // Get the database connection

        // Simple query to fetch data
        $query = "
            SELECT 
                NotableLanterns_ID AS id,
                NotableLanterns_Name AS name,
                Corps_ID AS corps,
                NotableLanterns_EarthVersion AS earth_version,
                NotableLanterns_Alias AS alias,
                NotableLanterns_Bio AS bio,
                NotableLanterns_FirstAppearance AS first_appearance,
                NotableLanterns_Status AS status
            FROM 
                notablelanterns_table
            ORDER BY 
                NotableLanterns_Name;
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
