<?php
/**
 * File ini dihasilkan secara otomatis untuk memperbaiki konfigurasi database.
 *
 * Annisa M D
 */

return [
    // Profil koneksi database default yang akan digunakan.
    'default_profile' => 'slims_db',

    // Daftar semua koneksi/node database yang tersedia.
    'nodes' => [
        'slims_db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'port' => '3306',
            'database' => 'slims_smpn2kt', // PENTING: Ganti ini jika nama database Anda berbeda.
            'username' => 'root',         // Standar untuk XAMPP
            'password' => '',             // Standar untuk XAMPP (kosong)
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
        ]
    ],

    // Opsi untuk proxy, biasanya tidak digunakan.
    'proxy' => false
];