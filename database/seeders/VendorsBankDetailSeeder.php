<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\VendorsBankDetail;
use DB;

class VendorsBankDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('vendors_bank_details')->truncate();

        $bankRecords = [
            ['vendor_id' => 5, 'account_holder_name' => 'Vendor 1', 'bank_name' => 'Bank 1', 'account_number' => '00000000001', 'bank_ifsc_code' => 'IFSC001', 'bank_swift_code' => 'SWIFT001', 'bank_address' => 'Address 1'],
            ['vendor_id' => 6, 'account_holder_name' => 'Vendor 2', 'bank_name' => 'Bank 2', 'account_number' => '00000000002', 'bank_ifsc_code' => 'IFSC002', 'bank_swift_code' => 'SWIFT002', 'bank_address' => 'Address 2'],
        ];

        // DB::table('vendors_bank_details')->insert($bankRecords);

        foreach ($bankRecords as $key => $record)
        {
            VendorsBankDetail::create($record);
        }
    }
}
