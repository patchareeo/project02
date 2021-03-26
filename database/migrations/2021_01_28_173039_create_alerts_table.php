<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->integer('orders_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('user_name');
            $table->integer('post_id')->unsigned();
            $table->integer('amount');
            $table->text('detail');

            $table->string('product_name');
            // $table->string('product_slug');  // add slug 
            $table->integer('product_price');
            // $table->string('product_image');
            // $table->string('product_date');
            // $table->text('time');
            $table->string('status');
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
        Schema::dropIfExists('alerts');
    }
}
