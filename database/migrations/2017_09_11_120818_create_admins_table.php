<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique')->unique()->index();
            $table->string('role')->index()->default('moderator');
            $table->boolean('active')->default(false);
            $table->string('first_name')->index();
            $table->string('last_name')->nullable()->index();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable()->index();
            $table->string('postal')->nullable()->index();
            $table->string('address1')->nullable()->index();
            $table->string('address2')->nullable()->index();
            $table->string('zip')->nullable()->index();
            $table->string('town')->nullable()->index();
            $table->string('county')->nullable()->index();
            $table->string('country')->nullable()->index();
            $table->string('avatar')->nullable()->index();
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
