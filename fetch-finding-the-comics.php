<?php
require_once 'util-db.php'; // Include database connection

/**
 * Main function to fetch and store comics data from multiple websites.
 */
function fetchAndStoreComics() {
    $conn = get_db_connection(); // Establish database connection

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
        print_r($data); // Debug fetched data

        foreach ($data as $comic) {
            saveComicToDatabase($conn, $comic); // Save each comic to the database
        }
    }

    $conn->close(); // Close the database connection
}

/**
 * Fetch HTML content with a proper User-Agent header using cURL.
 */
function fetchHTMLWithCurl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Set timeout
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "cURL error: " . curl_error($ch) . "<br>";
    }

    curl_close($ch);
    return $response;
}

/**
 * Fetch comics from Midtown Comics.
 */
function fetchMidtownComics($url) {
    $html = fetchHTMLWithCurl($url);
    if (!$html) {
        echo "Failed to fetch HTML from Midtown Comics.<br>";
        return [];
    }

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    // Update these XPath queries based on the website's structure
    $items = $xpath->query("//div[@class='comic-item']");
    $comics = [];

    foreach ($items as $item) {
        $title = $xpath->query(".//h3[@class='comic-title']", $item);
        $price = $xpath->query(".//span[@class='price']", $item);

        if ($title->length > 0 && $price->length > 0) {
            $comics[] = [
                'title' => trim($title->item(0)->nodeValue),
                'description' => 'Description not available',
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
    $html = fetchHTMLWithCurl($url);
    if (!$html) {
        echo "Failed to fetch HTML from Heritage Auctions.<br>";
        return [];
    }

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    // Update these XPath queries based on the website's structure
    $items = $xpath->query("//div[contains(@class, 'auction-item')]");
    $comics = [];

    foreach ($items as $item) {
        $title = $xpath->query(".//h3[contains(@class, 'item-title')]", $item);
        $price = $xpath->query(".//span[contains(@class, 'price')]", $item);

        if ($title->length > 0 && $price->length > 0) {
            $comics[] = [
                'title' => trim($title->item(0)->nodeValue),
                'description' => 'Heritage Auction Comic',
                'seller' => 'Heritage Auctions',
                'price' => filter_var($price->item(0)->nodeValue, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
                'rating' => null,
                'category' => 'premium',
                'url' => $url,
            ];
        }
    }

    return $comics;
}

/**
 * Fetch comics from League of Comic Geeks.
 */
function fetchLeagueOfComics($url) {
    $html = fetchHTMLWithCurl($url);
    if (!$html) {
        echo "Failed to fetch HTML from League of Comic Geeks.<br>";
        return [];
    }

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    // Update these XPath queries based on the website's structure
    $items = $xpath->query("//div[@class='comic-item']");
    $comics = [];

    foreach ($items as $item) {
        $title = $xpath->query(".//h3[@class='comic-title']", $item);
        $price = $xpath->query(".//span[@class='price']", $item);

        if ($title->length > 0 && $price->length > 0) {
            $comics[] = [
                'title' => trim($title->item(0)->nodeValue),
                'description' => 'League of Comic Geeks Comic',
                'seller' => 'League of Comic Geeks',
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
 * Save comic data to the database.
 */
function saveComicToDatabase($conn, $comic) {
    $stmt = $conn->prepare("INSERT INTO comics_table (Comics_Title, Comics_Description, Comics_Seller, Comics_Price, Comics_Rating, Comics_Category, Comics_URL) 
                            VALUES (?, ?, ?, ?, ?, ?, ?) 
                            ON DUPLICATE KEY UPDATE Comics_Updated_At = CURRENT_TIMESTAMP");

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

// Call the fetch function
fetchAndStoreComics();
?>
