<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors_business_details', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->string('shop_name');
            $table->string('shop_address');
            $table->string('shop_area');
            $table->string('shop_city');
            $table->string('shop_state');
            $table->string('shop_country');
            $table->string('shop_pincode');
            $table->string('shop_mobile');
            $table->string('shop_email');
            $table->string('shop_website');
            $table->string('address_proof');
            $table->string('address_proof_document');
            $table->string('business_registration_number');
            $table->string('gst_number');
            $table->string('ird_number');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors_business_details');
    }
};
