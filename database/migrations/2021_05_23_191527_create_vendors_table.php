<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('amount');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('vendors', function($table) {
            $table->foreignId('category_id')->references('id')->on('categories');
        });

        Schema::table('vendors', function($table) {
            $table->foreignId('training_id')->references('id')->on('trainings');
        });

        Schema::table('vendors', function($table) {
            $table->foreignId('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
