<?php

return [
    'tools' => [
        'header' => [
            'text' => [
                'type' => 'string',
            ],
            'level' => [
                'type' => 'int',
                'canBeOnly' => [1, 2, 3, 4, 5]
            ]
        ],
        'paragraph' => [
            'text' => [
                'type' => 'string',
                'allowedTags' => 'i,b,u,a[href]'
            ]
        ],
        'list' => [
            'style' => [
                'type' => 'string',
                'canBeOnly' =>
                    [
                        0 => 'ordered',
                        1 => 'unordered',
                    ],
            ],
            'items' => [
                'type' => 'array',
                'data' => [
                    '-' => [
                        'type' => 'string',
                        'allowedTags' => 'i,b,u',
                    ],
                ],
            ],
        ],
        'image' => [
            'file' => [
                'type' => 'array',
                'data' => [
                    'url' => [
                        'type' => 'string',
                    ],
                ],
            ],
            'caption' => [
                'type' => 'string'
            ],
            'withBorder' => [
                'type' => 'boolean'
            ],
            'withBackground' => [
                'type' => 'boolean'
            ],
            'stretched' => [
                'type' => 'boolean'
            ]
        ],
        'code' => [
            'code' => [
                'type' => 'string'
            ]
        ]
    ]
];
