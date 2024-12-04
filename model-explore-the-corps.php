<?php
// model-explore-the-corps.php

require_once 'util-db.php';

// Function to fetch all Corps
function selectCorps() {
    try {
        $conn = get_db_connection(); // Utilize connection from util-db.php
        $stmt = $conn->prepare("SELECT Corps_ID, Corps_Name, Corps_Description, CorpsEmotion_ID, CorpsColor_ID FROM corps_table");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result; // Return the result set
    } catch (Exception $e) {
        if (isset($conn)) $conn->close();
        throw $e; // Re-throw the exception for error handling
    }
}

// Function to insert a new Corps
function insertCorps($name, $description, $emotionId, $colorId) {
    try {
        $conn = get_db_connection(); // Utilize connection from util-db.php
        $stmt = $conn->prepare("INSERT INTO corps_table (Corps_Name, Corps_Description, CorpsEmotion_ID, CorpsColor_ID) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $name, $description, $emotionId, $colorId); // Bind parameters
        $stmt->execute();
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        if (isset($conn)) $conn->close();
        throw $e; // Re-throw the exception for error handling
    }
}
?>

