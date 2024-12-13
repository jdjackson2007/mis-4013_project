<?php
require_once 'util-db.php'; // Include the database connection utility

/**
 * Fetch all comics from the database
 * 
 * @param string|null $filter Optional filter for comics (e.g., seller, category)
 * @param string|null $value Value to filter by
 * @param string|null $sortBy Column to sort by (default: Comics_Title)
 * @param string $order Sort order (ASC or DESC, default: ASC)
 * @return array List of comics
 */
function getComicsFromDatabase($filter = null, $value = null, $sortBy = 'Comics_Title', $order = 'ASC') {
    $conn = get_db_connection(); // Get the database connection

    // Validate sort order
    $order = strtoupper($order) === 'DESC' ? 'DESC' : 'ASC';

    // Base query
   $query = "SELECT Comics_Title, Comics_Description, Comics_Seller, Comics_Price, Comics_Rating, Comics_URL 
          FROM lantern_corps.comics_table";

    // Add filtering condition if specified
    if ($filter && $value) {
        $query .= " WHERE $filter = ?";
    }

    // Add sorting
    $query .= " ORDER BY $sortBy $order";

    $stmt = $conn->prepare($query);
    if ($filter && $value) {
        $stmt->bind_param('s', $value); // Bind the filter value
    }

    if (!$stmt->execute()) {
        error_log("Database query failed: " . $stmt->error); // Log the error
        $conn->close();
        return []; // Return an empty array on failure
    }

    $result = $stmt->get_result();
    $comics = [];
    while ($row = $result->fetch_assoc()) {
        $comics[] = $row; // Add each comic to the array
    }

    $stmt->close();
    $conn->close(); // Close the database connection
    return $comics;
}
?>
