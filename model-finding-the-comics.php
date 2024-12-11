<?php
/**
 * Fetch comic sources including sellers, auctions, official sites, and rating platforms
 * 
 * @return array
 */
function getComicSources() {
    return [
        [
            'name' => 'Midtown Comics',
            'description' => 'One of the biggest comic book sellers for new comics and graphic novels.',
            'url' => 'https://www.midtowncomics.com',
            'rating_support' => false,
        ],
        [
            'name' => 'Heritage Auctions',
            'description' => 'Highly reputable auction house for rare and collectible comics.',
            'url' => 'https://comics.ha.com',
            'rating_support' => false,
        ],
        [
            'name' => 'Comic Book Roundup',
            'description' => 'Aggregates reviews and ratings for comics from multiple sources.',
            'url' => 'https://comicbookroundup.com',
            'rating_support' => true,
        ],
        [
            'name' => 'League of Comic Geeks',
            'description' => 'Provides user ratings, reviews, and upcoming comic releases.',
            'url' => 'https://leagueofcomicgeeks.com',
            'rating_support' => true,
        ],
        [
            'name' => 'eBay Collectibles',
            'description' => 'Find rare comics and memorabilia from verified sellers.',
            'url' => 'https://www.ebay.com/b/Comics-Graphic-Novels/63/bn_1853326',
            'rating_support' => false,
        ],
        [
            'name' => 'DC Comics Official Site',
            'description' => 'The official DC Comics website for the latest releases and news.',
            'url' => 'https://www.dc.com',
            'rating_support' => false,
        ],
    ];
}

/**
 * Fetch daily top Lantern Comics and where they're on sale
 * 
 * @return array
 */
function getTopLanternComics() {
    return [
        [
            'title' => 'Green Lantern #1 (2023)',
            'description' => 'A fresh start for Hal Jordan, featuring the return of classic Lantern adventures.',
            'seller' => 'Midtown Comics',
            'price' => '$4.99',
            'rating' => '9.2/10',
        ],
        [
            'title' => 'Sinestro Corps Special #1',
            'description' => 'Sinestro’s rise to power and the beginning of the Sinestro Corps War.',
            'seller' => 'Heritage Auctions',
            'price' => '$49.99 (graded)',
            'rating' => '8.9/10',
        ],
        [
            'title' => 'Blackest Night #0',
            'description' => 'Prelude to one of the most epic Lantern events.',
            'seller' => 'League of Comic Geeks',
            'price' => '$2.99',
            'rating' => '9.5/10',
        ],
    ];
}
