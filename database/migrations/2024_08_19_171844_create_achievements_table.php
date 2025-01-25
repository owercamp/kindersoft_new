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
    Schema::create('achievements', function (Blueprint $table) {
      $table->id();
      $table->foreignId('intelligence_id')->constrained('intelligences', 'id')->onUpdate('cascade');
      $table->unsignedBigInteger('register');
      $table->string('description');
      $table->foreignId('status_id')->nullable()->default(1)->constrained('states_names', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('achievements');
  }
};
