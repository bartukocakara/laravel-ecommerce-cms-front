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
            $table->text('address');
            $table->integer('city_id');
            $table->integer('district_id');
            $table->string('zip');
            $table->text('products');
            $table->decimal('tax', 15, 2);
            $table->decimal('sub_total', 15, 2);
            $table->decimal('grand_total', 15, 2);
            $table->integer('total_quantity');
            $table->decimal('shipping_cost')->default(10);
            $table->string('note')->nullable(true);
            $table->enum('shipping_company', ['YURTICI', 'ARAS', 'MNG', 'PTT'])->nullable(true);
            $table->enum('delivery_time', ['1_DAY', '2-4_DAY', '3-7_DAY']);
            $table->enum('payment_type', ['HAVALE', 'EFT', 'CREDIT_CARD']);
            $table->enum('status', ['PENDING', 'COMPLETED', 'DECLINED', 'ON_DELIVERY', 'CANCELED']);
            $table->enum('accept_contract', ['NO', 'YES']);
            $table->enum('same_address', ['NO', 'YES']);
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
