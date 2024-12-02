<?php
// model-explorecorps.php
function get_db_connection() {
    $conn = new mysqli("your-database-host", "your-username", "your-password", "your-database-name");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function getAllCorps() {
    $conn = get_db_connection();
    $query = "SELECT Corps_ID, Corps_Name, CorpsEmotion_ID, CorpsHQ_ID, Corps_Description, Corps_Image_URL 
              FROM corps_table";

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

function addNewCorps($name, $emotion, $hq, $description, $imageURL) {
    $conn = get_db_connection();

    $stmt = $conn->prepare("INSERT INTO corps_table (Corps_Name, CorpsEmotion_ID, CorpsHQ_ID, Corps_Description, Corps_Image_URL) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $name, $emotion, $hq, $description, $imageURL);

    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>
