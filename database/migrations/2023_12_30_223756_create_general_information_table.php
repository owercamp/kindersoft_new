<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('general_information', function (Blueprint $table) {
            $table->id();
            $table->string('company', 55);
            $table->string('commercial', 55);
            $table->integer('nit',10)->autoIncrement(false)->index('nit');
            $table->tinyInteger('dv',1)->autoIncrement(false);
            $table->string('email', 55);
            $table->tinyText('website');
            $table->integer('number_locations')->autoIncrement(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_information');
    }
};
