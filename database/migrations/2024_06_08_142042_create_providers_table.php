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
    Schema::create('providers', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('register');
      $table->enum('person', ['natural', 'juridica']);
      $table->foreignId('status_id')->constrained('states_names','id')->onUpdate('cascade')->onDelete('no action')->default(1);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('providers');
  }
};
