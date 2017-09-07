<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned()->index();
            $table->integer('shop_id')->nullable()->unsigned()->index();
            $table->integer('expert_id')->nullable()->unsigned()->index();
            $table->integer('admin_id')->nullable()->unsigned()->index();
            $table->string('file_name')->index();
            $table->longText('description')->nullable();
            $table->string('file_size')->nullable();
            $table->string('file_mime')->nullable();
            $table->boolean('published')->nullable()->index();
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
        Schema::dropIfExists('images');
    }
}
