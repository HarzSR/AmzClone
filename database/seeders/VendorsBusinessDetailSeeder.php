<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\VendorsBusinessDetail;
use DB;

class VendorsBusinessDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('vendors_business_details')->truncate();

        $businessRecords = [
            ['vendor_id' => 5, 'shop_name' => 'Shop 1', 'shop_address' => 'Address 1', 'shop_area' => 'Area 1', 'shop_city' => 'City 1', 'shop_state' => 'State 1', 'shop_country' => 'Country 1', 'shop_pincode' => '000001', 'shop_mobile' => '1234567890', 'shop_email' => 'shop1@shop.com', 'shop_website' => 'website1.com', 'address_proof' => 'Proof 1', 'address_proof_document' => 'Proof Document 1', 'business_registration_number' => '001', 'gst_number' => '0000001', 'ird_number' => 'PAN001'],
            ['vendor_id' => 6, 'shop_name' => 'Shop 2', 'shop_address' => 'Address 2', 'shop_area' => 'Area 2', 'shop_city' => 'City 2', 'shop_state' => 'State 2', 'shop_country' => 'Country 2', 'shop_pincode' => '000002', 'shop_mobile' => '1234567890', 'shop_email' => 'shop2@shop.com', 'shop_website' => 'website2.com', 'address_proof' => 'Proof 2', 'address_proof_document' => 'Proof Document 2', 'business_registration_number' => '002', 'gst_number' => '0000002', 'ird_number' => 'PAN002'],
        ];

        // DB::table('vendors_business_details')->insert($businessRecords);

        foreach ($businessRecords as $key => $record)
        {
            VendorsBusinessDetail::create($record);
        }
    }
}
