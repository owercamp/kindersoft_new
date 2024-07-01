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
    Schema::create('school_supplies', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('register');
      $table->string('description', 35);
      $table->unsignedBigInteger('price');
      $table->foreignId('status_id')->default(1)->constrained('states_names', 'id')->onUpdate('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('school_supplies');
  }
};
