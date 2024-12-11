function getLanternsData() {
    try {
        $conn = get_db_connection(); // Get the database connection

        // Corrected SQL query
        $query = "
            SELECT 
                nl.NotableLanterns_Name AS name,
                GROUP_CONCAT(DISTINCT nl.NotableLanterns_EarthVersion) AS earth_version,
                GROUP_CONCAT(DISTINCT nl.NotableLanterns_Alias) AS alias,
                GROUP_CONCAT(DISTINCT nl.NotableLanterns_Bio) AS bio,
                GROUP_CONCAT(DISTINCT nl.NotableLanterns_FirstAppearance) AS first_appearance,
                GROUP_CONCAT(DISTINCT nl.NotableLanterns_Status) AS status,
                nl.NotableLanterns_MultipleCorps AS multiple_corps,
                GROUP_CONCAT(DISTINCT c.Corps_Name) AS corps,
                GROUP_CONCAT(DISTINCT cc.CorpsColor_Name) AS colors,
                GROUP_CONCAT(DISTINCT ce.CorpsEmotion_Name) AS emotions,
                GROUP_CONCAT(DISTINCT ch.CorpsHQ_Planet) AS planets,
                GROUP_CONCAT(DISTINCT ch.CorpsHQ_Sector) AS sectors,
                GROUP_CONCAT(DISTINCT lsc.LanternsSpecialClasses_ClassName) AS classes
            FROM notablelanterns_table nl
            LEFT JOIN corps_table c ON FIND_IN_SET(c.Corps_ID, nl.NotableLanterns_MultipleCorps)
            LEFT JOIN corpscolor_table cc ON c.CorpsColor_ID = cc.CorpsColor_ID
            LEFT JOIN corpsemotion_table ce ON c.CorpsEmotion_ID = ce.CorpsEmotion_ID
            LEFT JOIN corpshq_table ch ON c.CorpsHQ_ID = ch.CorpsHQ_ID
            LEFT JOIN lanternclasses_table lc ON nl.NotableLanterns_ID = lc.NotableLanterns_ID
            LEFT JOIN lanternspecialclasses_table lsc ON lc.SpecialClasses_ID = lsc.LanternSpecialClasses_ID
            GROUP BY nl.NotableLanterns_Name, nl.NotableLanterns_MultipleCorps
            ORDER BY nl.NotableLanterns_Name;
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
