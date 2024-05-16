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
    Schema::create('students', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('register');
      $table->foreignId('identification_id')->nullable()->constrained('type_identifications', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->string('number_identification');
      $table->string('firstname');
      $table->string('middlename')->nullable();
      $table->string('lastname');
      $table->string('middlelastname')->nullable();
      $table->foreignId('nationality_id')->nullable()->constrained('countries', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('blood_id')->nullable()->constrained('bloodtypes', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('genre_id')->nullable()->constrained('genres', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->string('other_genre')->nullable();
      $table->unsignedInteger('gestation');
      $table->enum('velivery', ['Natural', 'Cesaria'])->default('Natural');
      $table->unsignedInteger('sibling');
      $table->enum('place', ['Mayor', 'Intermediate', 'Minor']);
      $table->boolean('allergy')->default(false);
      $table->string('allergys')->nullable();
      $table->boolean('therapy')->default(false);
      $table->string('therapies')->nullable();
      $table->boolean('prepaid')->default(false);
      $table->string('prepaids')->nullable();
      $table->boolean('special')->default(false);
      $table->string('specials')->nullable();
      $table->string('lives');
      $table->foreignId('eps_id')->nullable()->constrained('health_care_providers', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('students');
  }
};
