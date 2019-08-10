<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vendor_name');
            $table->string('vendor_country');
            $table->string('vendor_state');
            $table->string('vendor_city');
            $table->string('vendor_address');
            $table->string('vendor_phone');
            $table->string('vendor_logo')->nullable();
            $table->tinyInteger('vendor_verified')->default(0);
            $table->Integer('vendor_status')->default(200);
            $table->integer('vendor_owner')->references('id')->on('admins');;
            $table->text('vendor_description');
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
        Schema::dropIfExists('vendors');
    }
}
