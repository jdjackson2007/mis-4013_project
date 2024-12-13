<?php
function get_db_connection() {
    
    $conn = new mysqli(
        "mis4013project.mysql.database.azure.com", 
        "jdjackson2007",                          
        "DougDoug07&&",                           
        "lantern_corps"                        
    );

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>
