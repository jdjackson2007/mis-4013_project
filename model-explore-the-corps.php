<?php
require_once 'util-db.php'; 


function getCorpsData() {
    try {
        $conn = get_db_connection(); 

      
        $query = "
            SELECT 
                c.Corps_ID, 
                c.Corps_Name, 
                cc.CorpsColor_Name, 
                ce.CorpsEmotion_Name, 
                ch.CorpsHQ_Planet, 
                ch.CorpsHQ_Sector, 
                cs.CorpsHQSector_Description, 
                c.Corps_Description, 
                c.Corps_Oath
            FROM 
                corps_table c
            LEFT JOIN 
                corpscolor_table cc ON c.CorpsColor_ID = cc.CorpsColor_ID
            LEFT JOIN 
                corpsemotion_table ce ON c.CorpsEmotion_ID = ce.CorpsEmotion_ID
            LEFT JOIN 
                corpshq_table ch ON c.CorpsHQ_ID = ch.CorpsHQ_ID
            LEFT JOIN 
                corpssectors_table cs ON ch.CorpsHQ_ID = cs.CorpsHQ_ID
            ORDER BY 
                c.Corps_Name;
        ";

        
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            throw new Exception("Failed to prepare SQL statement: " . $conn->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        
        if ($result->num_rows === 0) {
            throw new Exception("No Corps data found in the database.");
        }

        
        $conn->close();
        return $result;

    } catch (Exception $e) {
       
        if (isset($conn) && $conn->ping()) {
            $conn->close();
        }
        
        throw new Exception("Error fetching Corps data: " . $e->getMessage());
    }
}
?>
