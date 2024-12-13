<?php
require_once 'util-db.php'; // Your database connection

/**
 * Fetch data from websites and populate comics_table.
 */
function fetchAndStoreComics() {
    $conn = get_db_connection(); // Connect to the database

    // List of supported websites with their methods
    $websites = [
        [
            'name' => 'Midtown Comics',
            'url' => 'https://www.midtowncomics.com/',
            'fetch_function' => 'fetchMidtownComics',
        ],
        [
            'name' => 'Heritage Auctions',
            'url' => 'https://comics.ha.com/',
            'fetch_function' => 'fetchHeritageComics',
        ],
        [
            'name' => 'League of Comic Geeks',
            'url' => 'https://leagueofcomicgeeks.com/',
            'fetch_function' => 'fetchLeagueOfComics',
        ]
    ];

    foreach ($websites as $website) {
        echo "Fetching data from: " . $website['name'] . "<br>";

        $data = call_user_func($website['fetch_function'], $website['url']);
        print_r($data); // Debugging: Print fetched data

        // Insert data into comics_table
        foreach ($data as $comic) {
            saveComicToDatabase($conn, $comic);
        }
    }

    $conn->close(); // Close the connection
}


/**
 * Fetch comics from Midtown Comics.
 */
function fetchMidtownComics($url) {
    $comics = [];
    $html = file_get_contents($url);
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    // Update these XPath queries based on the website's structure
    $items = $xpath->query("//div[@class='comic-item']");
    foreach ($items as $item) {
        $title = $xpath->query(".//h3[@class='comic-title']", $item);
        $price = $xpath->query(".//span[@class='price']", $item);

        if ($title->length > 0 && $price->length > 0) {
            $comics[] = [
                'title' => trim($title->item(0)->nodeValue),
                'description' => 'Description not available', // Update if available
                'seller' => 'Midtown Comics',
                'price' => filter_var($price->item(0)->nodeValue, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
                'rating' => null,
                'category' => 'top',
                'url' => $url,
            ];
        }
    }

    return $comics;
}

/**
 * Fetch comics from Heritage Auctions.
 */
function fetchHeritageComics($url) {
    $htmlContent = @file_get_contents($url); // Fetch the page content
    if (!$htmlContent) {
        error_log("Failed to fetch HTML from $url");
        return [];
    }

    $dom = new DOMDocument();
    @$dom->loadHTML($htmlContent);
    $xpath = new DOMXPath($dom);

    $comics = [];
    $items = $xpath->query("//div[contains(@class, 'auction-item')]"); // Update selector to match actual website structure

    foreach ($items as $item) {
        $title = $xpath->query(".//div[contains(@class, 'item-title')]", $item)->item(0);
        $price = $xpath->query(".//div[contains(@class, 'price')]", $item)->item(0);

        $comics[] = [
            'title' => $title ? trim($title->nodeValue) : 'N/A',
            'description' => 'Heritage Auction Comic',
            'seller' => 'Heritage Auctions',
            'price' => $price ? filter_var($price->nodeValue, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : 0,
            'rating' => null,
            'category' => 'premium',
            'url' => $url,
        ];
    }

    return $comics;
}

/**
 * Save comic data to the database.
 */
function saveComicToDatabase($conn, $comic) {
    $stmt = $conn->prepare("INSERT INTO comics_table (Comics_Title, Comics_Description, Comics_Seller, Comics_Price, Comics_Rating, Comics_Category, Comics_URL) VALUES (?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE Comics_Updated_At = CURRENT_TIMESTAMP");

    if (!$stmt) {
        die("Statement preparation failed: " . $conn->error);
    }

    $stmt->bind_param(
        "sssdsis",
        $comic['title'],
        $comic['description'],
        $comic['seller'],
        $comic['price'],
        $comic['rating'],
        $comic['category'],
        $comic['url']
    );

    if (!$stmt->execute()) {
        echo "Failed to save comic: " . $comic['title'] . "<br>";
        echo "Error: " . $stmt->error . "<br>";
    } else {
        echo "Saved comic: " . $comic['title'] . "<br>";
    }

    $stmt->close();
}

