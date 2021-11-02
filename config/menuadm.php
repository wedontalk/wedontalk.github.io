<?php
    return [
        [
            'label' => 'Trang Chủ',
            'route' => 'admin.dashboard',
            'icon' => 'fa-home'
        ],
        [
            'label' => 'Thống kê',
            'route' => 'thongke.index',
            'icon' => 'fa-chart-pie',
        ],
        [
            'label' => 'Thể Loại phim',
            'route' => 'loaiphim.index',
            'icon' => 'fa-folder-open',
            'items' =>
            [
                [
                'label' => 'xem Thể loại',
                'route' => 'loaiphim.index'
                ],
                [
                'label' => 'thêm Thể loại',
                'route' => 'loaiphim.create'
                ],
            ]

        ],
        [
            'label' => 'phim',
            'route' => 'phim.index',
            'icon' => 'fa-video',
            'items' =>
            [
                [
                'label' => 'xem phim',
                'route' => 'phim.index'
                ],
                [
                'label' => 'thêm phim',
                'route' => 'phim.create'
                ],
            ]

        ],
        [
            'label' => 'tập phim',
            'route' => 'tapphim.index',
            'icon' => 'fa-edit',
            'items' =>
            [
                [
                'label' => 'danh sách tập phim',
                'route' => 'tapphim.index'
                ],
                [
                    'label' => 'Thêm Tập phim',
                    'route' => 'tapphim.create',
                ],
            ]

        ],
        [
            'label' => 'kiểu phim',
            'route' => 'kieuphim.index',
            'icon' => 'fa-file-contract',
            'items' =>
            [
                [
                'label' => 'phim lẻ',
                'route' => 'phimle.index'
                ],
                [
                'label' => 'phim bộ',
                'route' => 'phimbo.index'
                ],
                [
                    'label' => 'phim chiếu rạp',
                    'route' => 'phimchieurap.index'
                ],
            ]

        ],
        [
            'label' => 'Quốc gia phim',
            'route' => 'quocgia.index',
            'icon' => 'fa-image',
            'items' =>
            [
                [
                'label' => 'xem Quốc gia phim',
                'route' => 'quocgia.index'
                ],
                [
                'label' => 'thêm quốc gia phim',
                'route' => 'quocgia.create'
                ],
            ]

        ],
        [
            'label' => 'account',
            'route' => 'account.index',
            'icon' => 'fa-user',
            'items' =>
            [
                [
                'label' => 'xem account',
                'route' => 'account.index'
                ]
            ]

        ]
        


    ]


?>