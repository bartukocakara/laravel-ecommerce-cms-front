<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('order_code');
            $table->string('customer_name');
            $table->string('customer_surname');
            $table->string('customer_email');
            $table->string('city');
            $table->string('district');
            $table->string('zip');
            $table->text('products');
            $table->integer('discount');
            $table->integer('tax');
            $table->integer('sub_total');
            $table->integer('grand_total');
            $table->integer('total_quantity');
            $table->integer('shipping_cost');
            $table->string('note');
            $table->enum('shipping_company', ['Yurtiçi', 'Aras', 'Mng', 'Ptt']);
            $table->enum('delivery_time', ['1_DAY', '2-4_DAY', '3-7_DAY']);
            $table->enum('payment_type', ['HAVALE', 'EFT', 'CREDIT_CARD']);
            $table->enum('status', ['PENDING', 'COMPLETED', 'DECLINED', 'ON_DELIVERY']);
            $table->string('card_number');
            $table->string('card_expiration');
            $table->string('card_cvv');
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
        Schema::dropIfExists('orders');
    }
}
