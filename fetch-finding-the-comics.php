<?php
require_once 'util-db.php'; // Your database connection
require_once 'simple_html_dom.php'; // Include Simple HTML DOM parser

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
        $data = call_user_func($website['fetch_function'], $website['url']);

        // Insert data into comics_table
        foreach ($data as $comic) {
            saveComicToDatabase($conn, $comic);
        }
    }

    $conn->close(); // Close the connection
}

/**
 * Fetch comics from Midtown Comics (example using cURL).
 */
function fetchMidtownComics($url) {
    // Example data array
    $comics = [];

    // Scrape data using cURL and parse it with Simple HTML DOM
    $html = file_get_html($url);
    foreach ($html->find('.comic-item') as $item) {
        $comics[] = [
            'title' => $item->find('.comic-title', 0)->plaintext,
            'description' => $item->find('.comic-description', 0)->plaintext,
            'seller' => 'Midtown Comics',
            'price' => filter_var($item->find('.price', 0)->plaintext, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            'rating' => null,
            'category' => 'top',
            'url' => $url,
        ];
    }

    return $comics;
}

/**
 * Fetch comics from Heritage Auctions (example using scraping).
 */
function fetchHeritageComics($url) {
    $comics = [];

    // Scrape data using Simple HTML DOM
    $html = file_get_html($url);
    foreach ($html->find('.auction-item') as $item) {
        $comics[] = [
            'title' => $item->find('.item-title', 0)->plaintext,
            'description' => 'Heritage Auction Comic',
            'seller' => 'Heritage Auctions',
            'price' => filter_var($item->find('.price', 0)->plaintext, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            'rating' => null,
            'category' => 'premium',
            'url' => $url,
        ];
    }

    return $comics;
}

/**
 * Fetch comics from League of Comic Geeks.
 */
function fetchLeagueOfComics($url) {
    $comics = [];

    // Scrape or call API (example assumes API support)
    $response = file_get_contents($url . '/api/v1/comics/top');
    $data = json_decode($response, true);

    foreach ($data as $item) {
        $comics[] = [
            'title' => $item['title'],
            'description' => $item['description'] ?? 'Top comic from League of Comic Geeks.',
            'seller' => 'League of Comic Geeks',
            'price' => $item['price'] ?? null,
            'rating' => $item['rating'] ?? null,
            'category' => 'top',
            'url' => $item['url'],
        ];
    }

    return $comics;
}

/**
 * Save comic data to the database.
 */
function saveComicToDatabase($conn, $comic) {
    $stmt = $conn->prepare("INSERT INTO comics_table (Comics_Title, Comics_Description, Comics_Seller, Comics_Price, Comics_Rating, Comics_Category, Comics_URL) VALUES (?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE Comics_Updated_At = CURRENT_TIMESTAMP");
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
    $stmt->execute();
    $stmt->close();
}

// Call the fetch function
fetchAndStoreComics();
?>
