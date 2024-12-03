<?php
function get_db_connection() {
    $conn = new mysqli("mis4013project.mysql.database.azure.com", "jdjackson2007", "DougDoug07&&", "lantern_corps");

    if ($conn->connect_error) {
        die("Database Connection Failed: " . $conn->connect_error);
    }

    // Set character set to UTF-8
    $conn->set_charset("utf8mb4");

    return $conn;
}

function getAllCorps() {
    $conn = get_db_connection();
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

    if (!$result) {
        die("Error Fetching Corps Data: " . $conn->error);
    }

    $corpsData = [];
    while ($row = $result->fetch_assoc()) {
        $corpsData[] = $row;
    }

    $conn->close();
    return $corpsData;
}

function getAllEmotions() {
    $conn = get_db_connection();
    $query = "SELECT Emotion_ID, Emotion_Name FROM emotions_table";
    $result = $conn->query($query);

    if (!$result) {
        die("Error Fetching Emotions: " . $conn->error);
    }

    $emotions = [];
    while ($row = $result->fetch_assoc()) {
        $emotions[] = $row;
    }

    $conn->close();
    return $emotions;
}

function getAllHeadquarters() {
    $conn = get_db_connection();
    $query = "SELECT HQ_ID, HQ_Name FROM headquarters_table";
    $result = $conn->query($query);

    if (!$result) {
        die("Error Fetching Headquarters: " . $conn->error);
    }

    $headquarters = [];
    while ($row = $result->fetch_assoc()) {
        $headquarters[] = $row;
    }

    $conn->close();
    return $headquarters;
}

function addNewCorps($name, $emotion, $hq, $description) {
    $conn = get_db_connection();

    $stmt = $conn->prepare("
        INSERT INTO corps_table (Corps_Name, CorpsEmotion_ID, CorpsHQ_ID, Corps_Description)
        VALUES (?, ?, ?, ?)
    ");

    $stmt->bind_param("siis", $name, $emotion, $hq, $description);

    if (!$stmt->execute()) {
        die("Error Adding Corps: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>
