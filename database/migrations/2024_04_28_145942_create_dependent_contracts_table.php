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
    Schema::create('dependent_contracts', function (Blueprint $table) {
      $table->id();
      $table->foreignId('attendant_id')->nullable()->constrained('attendants', 'id')->onUpdate('cascade')->onDelete('cascade');
      $table->string('company');
      $table->string('nit');
      $table->foreignId('position_id')->nullable()->constrained('employment_positions', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->date('date_entry');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('dependent_contracts');
  }
};
