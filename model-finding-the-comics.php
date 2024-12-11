<?php
/**
 * Fetch comic sources including sellers, auction houses, and official websites
 * 
 * @return array
 */
function getComicSources() {
    return [
        [
            'name' => 'Midtown Comics',
            'description' => 'One of the biggest comic book sellers for new comics and graphic novels.',
            'url' => 'https://www.midtowncomics.com',
        ],
        [
            'name' => 'Heritage Auctions',
            'description' => 'Highly reputable auction house for rare and collectible comics.',
            'url' => 'https://comics.ha.com',
        ],
        [
            'name' => 'eBay Collectibles',
            'description' => 'Find rare comics and memorabilia from verified sellers.',
            'url' => 'https://www.ebay.com/b/Comics-Graphic-Novels/63/bn_1853326',
        ],
        [
            'name' => 'DC Comics Official Site',
            'description' => 'The official DC Comics website for the latest releases and news.',
            'url' => 'https://www.dc.com',
        ],
    ];
}
