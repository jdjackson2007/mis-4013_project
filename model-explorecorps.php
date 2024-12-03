<?php

function get_db_connection() {
    $conn = new mysqli("mis4013project.mysql.database.azure.com", "jdjackson2007", "DougDoug07&&", "lantern_corps");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set character set to UTF-8
    $conn->set_charset("utf8mb4");

    return $conn;
}

function getAllCorps() {
    $conn = get_db_connection();

    // Query to fetch corps data along with Emotion and HQ names
    $query = "
        SELECT 
            corps_table.Corps_ID,
            corps_table.Corps_Name,
            emotions_table.Emotion_Name AS CorpsEmotion,
            headquarters_table.HQ_Name AS CorpsHQ,
            corps_table.Corps_Description
        FROM corps_table
        JOIN emotions_table ON corps_table.CorpsEmotion_ID = emotions_table.Emotion_ID
        JOIN headquarters_table ON corps_table.CorpsHQ_ID = headquarters_table.HQ_ID
    ";

    $result = $conn->query($query);
    $corpsData = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $corpsData[] = $row;
        }
    }

    $conn->close();
    return $corpsData;
}

/**
 * Add a new Lantern Corps to the database.
 *
 * @param string $name Corps name
 * @param int $emotion Emotion ID
 * @param int $hq Headquarters ID
 * @param string $description Corps description
 */
function addNewCorps($name, $emotion, $hq, $description) {
    $conn = get_db_connection();

    // Prepare the SQL statement
    $stmt = $conn->prepare("
        INSERT INTO corps_table (Corps_Name, CorpsEmotion_ID, CorpsHQ_ID, Corps_Description)
        VALUES (?, ?, ?, ?)
    ");

    // Bind parameters
    $stmt->bind_param("siis", $name, $emotion, $hq, $description);

    // Execute the statement
    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}

?>
