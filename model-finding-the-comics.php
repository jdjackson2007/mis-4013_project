<?php
/**
 * Fetch comics data.
 * This function returns a list of static comic-related information organized for user-friendly display.
 */
function fetchComicsData() {
    return [
        [
            'title' => 'Where to Buy New Comics',
            'description' => 'Discover the latest comic book releases from trusted online stores.',
            'details' => [
                'Marvel Store: https://www.marvel.com',
                'Midtown Comics: https://www.midtowncomics.com',
                'Things From Another World: https://www.tfaw.com'
            ]
        ],
        [
            'title' => 'DC Comics Subscription',
            'description' => 'Subscribe to DC Universe Infinite to access thousands of DC comics digitally.',
            'details' => [
                'Website: https://www.dcuniverseinfinite.com',
                'Monthly Cost: $7.99',
                'Rating: ★★★★☆ (4.8/5)'
            ]
        ],
        [
            'title' => 'Where to Find Collectible Comics',
            'description' => 'Purchase rare and valuable comics from well-known vendors.',
            'details' => [
                'Heritage Auctions: https://www.ha.com',
                'ComicConnect: https://www.comicconnect.com',
                'MyComicShop: https://www.mycomicshop.com'
            ]
        ],
        [
            'title' => 'Understanding Comic Grading',
            'description' => 'Learn about the CGC grading system and its importance in valuing comics.',
            'details' => [
                'Scale: 0.5 (Poor) to 10.0 (Gem Mint)',
                'Factors: Cover quality, interior pages, overall preservation',
                'Why it Matters: Higher grades significantly increase comic value',
                'Example: Action Comics #1 (CGC 9.0) sold for over $3.2M'
            ]
        ]
    ];
}

/**
 * Retrieve comics data.
 *
 * @return array The list of comics and related information.
 */
function getComicsData() {
    return fetchComicsData();
}
?>
