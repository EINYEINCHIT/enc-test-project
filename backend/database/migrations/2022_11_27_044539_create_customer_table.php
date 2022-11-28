<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->longtext('photo');
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->string('phone_no');
            $table->string('date_of_birth');
            $table->integer('nrc_code_id');
            $table->enum('citizen_type', ['C', 'AC', 'NC', 'V', 'M', 'N'])->default('C');
            $table->string('nrc_no');
            $table->string('gender');
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
        Schema::dropIfExists('customer');
    }
};
