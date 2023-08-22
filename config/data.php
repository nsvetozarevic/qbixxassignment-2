<?php

declare(strict_types=1);

use Domain\Clients\Models\Item;

return [
    /*
    |--------------------------------------------------------------------------
    | Client items default data
    |--------------------------------------------------------------------------
    |
    | This items will be added by default when creating a new client, then it
    | could be updated later
    |
    */

    'items' => [
        [
            'type' => Item::TYPE_WISDOM,
            'title' => [
                'en' => 'Soren Kierkegaard quote',
                'nl' => 'Soren Kierkegaard citaat',
                'fr' => 'Soren Kierkegaard citation',
            ],
            'paragraph' => [
                'en' => 'Life is not a problem to be solved, but a reality to be experienced – Soren Kierkegaard',
                'nl' => 'Het leven is geen probleem dat moet worden opgelost, maar een realiteit die moet worden ervaren – Soren Kierkegaard',
                'fr' => 'La vie n\'est pas un problème à résoudre, mais une réalité à vivre – Soren Kierkegaard',
            ],
        ],
        [
            'type' => Item::TYPE_PHILOSOPHY,
            'title' => [
                'en' => 'Mark Twain quote',
                'nl' => 'Mark Twain citaat',
                'fr' => 'Mark Twain citation',
            ],
            'paragraph' => [
                'en' => 'The two most important days in your life are the day you are born and the day you find out why – Mark Twain',
                'nl' => 'De twee belangrijkste dagen in je leven zijn de dag dat je geboren wordt en de dag dat je erachter komt waarom – Mark Twain',
                'fr' => 'Les deux jours les plus importants de votre vie sont le jour de votre naissance et le jour où vous découvrez pourquoi – Mark Twain',
            ],
        ],
        [
            'type' => Item::TYPE_DESIGN,
            'title' => [
                'en' => 'R.Buckminster Fuller quote',
                'nl' => 'R.Buckminster Fuller citaat',
                'fr' => 'R.Buckminster Fuller citation',
            ],
            'paragraph' => [
                'en' => 'When I am working on a problem, I never think about beauty but when I have finished, if the solution is not beautiful, I know it is wrong - R.Buckminster Fuller',
                'nl' => 'Als ik aan een probleem werk, denk ik nooit aan schoonheid, maar als ik klaar ben, als de oplossing niet mooi is, weet ik dat het verkeerd is – R.Buckminster Fuller',
                'fr' => 'Quand je travaille sur un problème, je ne pense jamais à la beauté mais quand j\'ai fini, si la solution n\'est pas belle, je sais qu\'elle est fausse – R.Buckminster Fuller',
            ],
        ],
    ],
];
