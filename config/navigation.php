<?php

$nav = [
    "Laporan" => [
        [
            "title" => "Laporan Pembayaran",
            "icon" => '<i class="menu-icon tf-icons bx bx-line-chart"></i>',
            'route' => null,
            'permissions' => null
        ],
    ],
    "Transaksi" => [
        [
            "title" => "Pemakaian",
            "icon" => '<i class="menu-icon tf-icons bx bx-droplet"></i>',
            'route' => 'pemakaian.index',
            'permissions' => ['pemakaian view']
        ],
        [
            "title" => "Tagihan",
            "icon" => '<i class="menu-icon tf-icons bx bx-credit-card-front"></i>',
            'route' => 'tagihan.index',
            'permissions' => ['tagihan view']
        ],
        [
            "title" => "Pembayaran",
            "icon" => '<i class="menu-icon tf-icons bx bx-credit-card-front"></i>',
            'route' => 'pembayaran.index',
            'permissions' => ['pembayaran view']
        ],
    ],
    "Master" => [
        [
            "title" => "Pelanggan",
            "icon" => '<i class="menu-icon tf-icons bx bx-user-voice"></i>',
            'route' => 'pelanggan.index',
            'permissions' => ['pelanggan view']
        ],
        [
            "title" => "Layanan",
            "icon" => '<i class="menu-icon tf-icons bx bx-dock-bottom"></i>',
            'route' => 'layanan.index',
            'permissions' => ['layanan view']
        ],
        [
            "title" => "Meteran",
            "icon" => '<i class="menu-icon tf-icons bx bx-tachometer"></i>',
            'route' => 'meteran.index',
            'permissions' => ['meteran view']
        ],
    ],
    "Misc" => [
        [
            "title" => "Manajemen Users",
            "icon" => '<i class="menu-icon tf-icons bx bx-lock-open-alt"></i>',
            "submenus" => [
                [
                    'title' => 'Users',
                    'route' => 'users.index',
                    'permissions' => ['user view']
                ],
                [
                    'title' => 'Roles',
                    'route' => 'roles.index',
                    'permissions' => ['role & permission view']
                ],
            ],
        ],
    ]
];

return $nav;
