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
    Schema::create('quotationables', function (Blueprint $table) {
      $table->id();
      $table->foreignId('quotation_id')->constrained('quotations','id');
      $table->foreignId('quotationable_id');
      $table->string('quotationable_type');
      $table->timestamps();

      $table->unique(['quotation_id', 'quotationable_id', 'quotationable_type'], 'quotationable_unique');
      $table->index(['quotationable_id', 'quotationable_type']);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('quotationables');
  }
};
