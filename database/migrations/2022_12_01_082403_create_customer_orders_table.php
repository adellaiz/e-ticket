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
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->string('name');
            $table->enum('gender', ['M', 'F'])->nullable();
            $table->string('email');
            $table->string('phone_number');
            $table->enum('type', ['CUSTOMER', 'VISITOR']);
            $table->string('ktp_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_orders');
    }
};
