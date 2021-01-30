<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');  // add slug 
            $table->string('price');
            $table->string('image');
            $table->string('amount');
            $table->string('date');
            $table->text('time');
            $table->text('detail');
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
        Schema::dropIfExists('history_posts');
    }
}
