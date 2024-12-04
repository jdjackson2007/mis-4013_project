<?php
// model-explore-the-corps.php

require_once 'util-db.php';

// Function to fetch Corps data with all required joins
function getCorpsData() {
    try {
        $conn = get_db_connection();
        $query = "
            SELECT 
                c.Corps_ID, c.Corps_Name, c.Corps_Description, c.Corps_Oath,
                cc.CorpsColor_Name, ce.CorpsEmotion_Name, 
                chq.CorpsHQ_Planet, chq.CorpsHQ_Sector,
                cs.CorpsSectors_SectorNumber, cs.CorpsSectors_Description
            FROM corps_table c
            LEFT JOIN corpscolor_table cc ON c.CorpsColor_ID = cc.CorpsColor_ID
            LEFT JOIN corpsemotion_table ce ON c.CorpsEmotion_ID = ce.CorpsEmotion_ID
            LEFT JOIN corpshq_table chq ON c.CorpsHQ_ID = chq.CorpsHQ_ID
            LEFT JOIN corpssectors_table cs ON chq.CorpsHQ_Sector = cs.CorpsSectors_SectorNumber
        ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        if (isset($conn)) $conn->close();
        throw $e;
    }
}
?>
