<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned()->index();
            $table->integer('shop_id')->nullable()->unsigned()->index();
            $table->integer('expert_id')->nullable()->unsigned()->index();
            $table->integer('admin_id')->nullable()->unsigned()->index();
            $table->integer('category_id')->nullable()->unsigned()->index();
            $table->string('unique')->nullable()->unique()->index();
            $table->string('slug')->nullable()->index();
            $table->string('name')->nullable()->index();
            $table->longText('description')->nullable();
            $table->string('size')->index()->nullable();
            $table->string('color')->index()->nullable();
            $table->string('old_price')->index()->nullable();
            $table->string('new_price')->index()->nullable();
            $table->string('availability')->index()->nullable();
            $table->string('stock')->index()->nullable();
            $table->float('rating')->nullable();
            $table->integer('hits')->nullable();
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
        Schema::dropIfExists('products');
    }
}
