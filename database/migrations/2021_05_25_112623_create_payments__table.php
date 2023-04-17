<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->string('method');
            $table->timestamps();
        });

        Schema::table('payments_', function($table) {
            $table->foreignId('user_id')->references('id')->on('vendors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments_');
    }
}
