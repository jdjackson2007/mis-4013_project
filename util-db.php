<?php
function get_db_connection() {
    // Create connection
    $conn = new mysqli(
        "mis4013project.mysql.database.azure.com", 
        "jdjackson2007",                          
        "DougDoug07&&",                           
        "mis-4013_Project"                        
    );

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>
