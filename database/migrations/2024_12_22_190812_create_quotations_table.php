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
    Schema::create('quotations', function (Blueprint $table) {
      $table->id();
      $table->foreignId('register');
      $table->date('date');
      $table->foreignId('scheduling_id')->nullable()->constrained('schedulings', 'id')->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('admission_id')->nullable()->constrained('admissions', 'id')->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('journal_id')->nullable()->constrained('journays', 'id')->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('feeding_id')->nullable()->constrained('feedings', 'id')->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('uniform_id')->nullable()->constrained('uniforms', 'id')->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('extra_time_id')->nullable()->constrained('extra_times', 'id')->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('extra_curricular_id')->nullable()->constrained('extracurriculars', 'id')->onUpdate('cascade')->onDelete('cascade');
      $table->foreignId('transport_id')->nullable()->constrained('transports', 'id')->onUpdate('cascade')->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('quotations');
  }
};
