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
            $table->string('status')->default('wishlist');//по статусу мы также будем узнавать и корзину ,и "желаемое".
            //к примеру то,что находится со статусом "cart" у пользователя,то и будет у него в корзине.
            //как только он сделает заказ,статус поменяется
            $table->integer('user_id');
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('street_address')->nullable();
            $table->string('apartment')->nullable();
            $table->tinyInteger('postcode_zip')->nullable();
            $table->tinyInteger('phone')->nullable();
            $table->integer('price')->nullable();
            $table->text('note')->nullable();
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
