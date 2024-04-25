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
    Schema::create('attendants', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('register');
      $table->foreignId('type_identification_id')->constrained('type_identifications', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->string('number_document');
      $table->string('firstname');
      $table->string('middlename')->nullable();
      $table->string('lastname');
      $table->string('middlelastname')->nullable();
      $table->foreignId('country_id')->constrained('countries', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('department_id')->constrained('departaments', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('municipality_id')->constrained('municipalities', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('city_id')->constrained('cities','id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('location_id')->constrained('neighborhoods','id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('postal_id')->constrained('postals','id')->onUpdate('cascade')->onDelete('set null');
      $table->string('address');
      $table->string('phone');
      $table->string('email');
      $table->foreignId('nationality_id')->constrained('countries','id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('genre_id')->constrained('genres','id')->onUpdate('cascade')->onDelete('set null');
      $table->string('genre_text')->nullable();
      $table->foreignId('academic_id')->constrained('academic_levels','id')->onUpdate('cascade')->onDelete('set null');
      $table->string('academic_text');
      $table->foreignId('bloodtype_id')->constrained('bloodtypes','id')->onUpdate('cascade')->onDelete('set null');
      $table->enum('contract',['DEPENDIENTE','INDEPENDIENTE']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('attendants');
  }
};
