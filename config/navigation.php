<?php

$nav = [
    "Laporan" => [
        [
            "title" => "Laporan Pembayaran",
            "icon" => '<i class="menu-icon tf-icons bx bx-line-chart"></i>',
            'route' => 'laporan-pembayaran.index',
            'permissions' => ['laporan-pembayaran view']
        ],
        [
            "title" => "Laporan Per Meteran",
            "icon" => '<i class="menu-icon tf-icons bx bx-group"></i>',
            'route' => 'laporan-pelanggan.index',
            'permissions' => ['laporan-pelanggan view']
        ],
        [
            "title" => "Rekap Pembayaran",
            "icon" => '<i class="menu-icon tf-icons bx bx-credit-card-front"></i>',
            'route' => 'rekap.index',
            'permissions' => ['rekap view']
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
        [
            "title" => "Petugas",
            "icon" => '<i class="menu-icon tf-icons bx bx-tachometer"></i>',
            'route' => 'petugas.index',
            'permissions' => ['petugas view']
        ],
        [
            "title" => "Area Petugas",
            "icon" => '<i class="menu-icon tf-icons bx bx-tachometer"></i>',
            'route' => 'area-petugas.index',
            'permissions' => ['area-petugas view']
        ],
    ],
    "Settings" => [
        [
            "title" => "User",
            "icon" => '<i class="menu-icon tf-icons bx bx-group"></i>',
            'route' => 'users.index',
            'permissions' => ['user view']
        ],
        [
            "title" => "Roles & Permissions",
            "icon" => '<i class="menu-icon tf-icons bx bx-shield-quarter"></i>',
            'route' => 'roles.index',
            'permissions' => ['role & permission view']
        ],
    ],
];

return $nav;
