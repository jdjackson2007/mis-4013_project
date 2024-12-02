<?php
// model-explorecorps.php

// Enable MySQLi error reporting for debugging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/**
 * Establish a database connection.
 *
 * @return mysqli Database connection object
 */
function get_db_connection() {
    $conn = new mysqli("mis4013project.mysql.database.azure.com", "jdjackson2007", "DougDoug07&&", "lantern_corps");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set character set to UTF-8
    $conn->set_charset("utf8mb4");

    return $conn;
}

/**
 * Fetch all Lantern Corps with Emotion and Headquarters names.
 *
 * @return array Array of Lantern Corps data
 */
function getAllCorps() {
    $conn = get_db_connection();

    // Query to fetch corps data along with Emotion and HQ names
    $query = "
        SELECT 
            corps_table.Corps_ID,
            corps_table.Corps_Name,
            emotions_table.Emotion_Name AS CorpsEmotion,
            headquarters_table.HQ_Name AS CorpsHQ,
            corps_table.Corps_Description,
            corps_table.Corps_Image_URL
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
 * @param string $imageUrl Corps image URL
 */
function addNewCorps($name, $emotion, $hq, $description, $imageUrl) {
    $conn = get_db_connection();

    // Prepare the SQL statement
    $stmt = $conn->prepare("
        INSERT INTO corps_table (Corps_Name, CorpsEmotion_ID, CorpsHQ_ID, Corps_Description, Corps_Image_URL)
        VALUES (?, ?, ?, ?, ?)
    ");

    // Bind parameters
    $stmt->bind_param("siiss", $name, $emotion, $hq, $description, $imageUrl);

    // Execute the statement
    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}

?>
