<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned()->index();
            $table->integer('shop_id')->nullable()->unsigned()->index();
            $table->integer('expert_id')->nullable()->unsigned()->index();
            $table->integer('admin_id')->nullable()->unsigned()->index();
            $table->integer('category_id')->nullable()->unsigned()->index();
            $table->string('unique')->nullable()->unique()->index();
            $table->string('slug')->nullable()->unique();
            $table->string('excerpt')->nullable()->index();
            $table->string('title')->index();
            $table->longText('body');
            $table->string('image')->nullable();
            $table->boolean('published')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
