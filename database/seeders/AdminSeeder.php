<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Admin;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('admins')->truncate();

        $adminRecords = [
            ['name' => 'Administrator 1', 'type' => 'admin', 'vendor_id' => 0, 'mobile' => '1234567890', 'email' => 'admin1@admin.com', 'password' => '$2y$10$c/wQvMiX49/KVGcPO4tm0OShJKBCAM7noLjCa6gnMSZqfZPowVJ7y', 'image' => '', 'status' => 1],
            ['name' => 'Administrator 2', 'type' => 'admin', 'vendor_id' => 0, 'mobile' => '1234567890', 'email' => 'admin2@admin.com', 'password' => '$2y$10$kxaLkjYSSrjj.dFAVE02G.aloXYk3O2P6HN.fgp/ryRo65L/Jc4Oy', 'image' => '', 'status' => 1],
            ['name' => 'Sub Admin 1', 'type' => 'sub-admin', 'vendor_id' => 0, 'mobile' => '1234567890', 'email' => 'subadmin@admin.com', 'password' => '$2y$10$G0XPA2BEnvKwgj9Rs1qqxORWullVO8HXH1mPp0SAXZ/uA8u1jwyd2', 'image' => '', 'status' => 1],
            ['name' => 'Sub Admin 2', 'type' => 'sub-admin', 'vendor_id' => 0, 'mobile' => '1234567890', 'email' => 'subadmin2@admin.com', 'password' => '$2y$10$1/mqP9ogHUBks13dxFSGJuqxVMxHVZ3vnfGYVdAynpaIqqs9spc5W', 'image' => '', 'status' => 1],
        ];

        // DB::table('admins')->insert($adminRecords);

        foreach ($adminRecords as $key => $record)
        {
            Admin::create($record);
        }
    }
}
