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
    Schema::create('potential_customers', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('register');
      $table->date('date');
      $table->string('name_attendant');
      $table->string('phone',50);
      $table->string('whatsapp',50);
      $table->string('email', 50);
      $table->enum('applicants', [1, 2, 3, 4, 5, 6, 7, 8, 9])->default(1);
      $table->string('name_applicant');
      $table->foreignId('genre_id')->constrained('genres', 'id')->onUpdate('cascade')->onDelete('no action');
      $table->date('birthdate');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('potential_customers');
  }
};
