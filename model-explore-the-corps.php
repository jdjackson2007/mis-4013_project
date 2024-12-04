<?php
// model-explore-the-corps.php

// Include database utility file
require_once 'util-db.php';

// Function to fetch all Corps
function getCorps()
{
    global $conn; // Using the connection from util-db.php
    $query = "SELECT * FROM corps_table";
    $result = $conn->query($query);

    $corps = [];
    while ($row = $result->fetch_assoc()) {
        $corps[] = $row;
    }
    return $corps;
}

// Function to add a new Corps
function addCorps($name, $description, $emotion, $color)
{
    global $conn; // Using the connection from util-db.php
    $stmt = $conn->prepare("INSERT INTO corps_table (Corps_Name, Corps_Description, CorpsEmotion_ID, CorpsColor_ID) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $name, $description, $emotion, $color);
    $stmt->execute();
    $stmt->close();
}
