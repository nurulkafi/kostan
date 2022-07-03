<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'kost-list',
            'kost-create',
            'kost-edit',
            'kost-delete',
            'tipe-kamar-list',
            'tipe-kamar-create',
            'tipe-kamar-edit',
            'tipe-kamar-delete',
            'fasilitas-list',
            'fasilitas-create',
            'fasilitas-edit',
            'fasilitas-delete',
            'transaksi-sewa-list',
            'transaksi-sewa-create',
            'transaksi-sewa-edit',
            'transaksi-sewa-delete',
            'media-pembayaran-list',
            'media-pembayaran-create',
            'media-pembayaran-edit',
            'media-pembayaran-delete',
            'pembayaran-list',
            'pembayaran-create',
            'pembayaran-edit',
            'pembayaran-delete',
            'dashboard'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
