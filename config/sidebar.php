<?php

return [

  /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

  'menu' => [
    [
      'icon' => 'fa fa-dashboard',
      'title' => 'Dasbor',
      'url' => '/',
      'route-name' => 'home'
    ],
    [
      'icon' => 'fa fa-bank',
      'title' => 'Keuangan',
      'url' => 'javascript:;',
      'caret' => true,
      'sub_menu' => [
        [
          'url' => '/accounting',
          'title' => 'CoA',
        ]
      ]
    ],
    [
      'icon' => 'fa fa-users',
      'title' => 'Karyawan',
      'url' => 'javascript:;',
      'caret' => true,
      'sub_menu' => [
        [
          'url' => '/employee',
          'title' => 'Employee',
        ]
      ]
    ],
    [
      'icon' => 'fa fa-briefcase',
      'title' => 'Human Resource',
      'url' => 'javascript:;',
      'caret' => true,
      'sub_menu' => [
        [
          'url' => '/hr/recruitment',
          'title' => 'Rekruitmen',
        ],
        [
          'url' => '/hr/recruitment-selection',
          'title' => 'Seleksi Rekruitmen',
        ],
        [
          'url' => '/hr/recruitment-test',
          'title' => 'Tes Rekruitmen',
        ],
        [
          'url' => '/hr/recruitment-assessment',
          'title' => 'Penilaian',
        ],
        [
          'url' => '/hr/recruitment-archive',
          'title' => 'Arsip Rekruitmen',
        ],
      ]
    ],
    [
      'icon' => 'fa fa-shield',
      'title' => 'Integration',
      'url' => 'javascript:;',
      'caret' => true,
      'sub_menu' => [
        [
          'url' => '/integration/oauth2',
          'title' => 'oAuth2 Apps',
        ]
      ]
    ],
    [
      'icon' => 'fa fa-align-left',
      'title' => 'Menu Level',
      'url' => 'javascript:;',
      'caret' => true,
      'sub_menu' => [
        [
          'url' => 'javascript:;',
          'title' => 'Menu 1.1',
          'sub_menu' => [
            [
              'url' => 'javascript:;',
              'title' => 'Menu 2.1',
              'sub_menu' => [
                [
                  'url' => 'javascript:;',
                  'title' => 'Menu 3.1',
                ],
                [
                  'url' => 'javascript:;',
                  'title' => 'Menu 3.2'
                ]
              ]
            ],
            [
              'url' => 'javascript:;',
              'title' => 'Menu 2.2'
            ],
            [
              'url' => 'javascript:;',
              'title' => 'Menu 2.3'
            ]
          ]
        ],
        [
          'url' => 'javascript:;',
          'title' => 'Menu 1.2'
        ],
        [
          'url' => 'javascript:;',
          'title' => 'Menu 1.3'
        ]
      ]
    ]
  ]
];
