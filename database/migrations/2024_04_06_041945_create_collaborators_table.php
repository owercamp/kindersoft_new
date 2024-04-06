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
    Schema::create('collaborators', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('register');
      $table->foreignId('type_identification_id')->nullable()->constrained('type_identifications', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->string('document_number', 17);
      $table->string('firstname');
      $table->string('middlename');
      $table->string('lastname');
      $table->string('middlelastname');
      $table->foreignId('country_id')->nullable()->constrained('countries','id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('department_id')->nullable()->constrained('departaments', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('municipality_id')->nullable()->constrained('municipalities','id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('city_id')->nullable()->constrained('cities','id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('neighborhood_id')->nullable()->constrained('neighborhoods','id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('postal_id')->nullable()->constrained('postals','id')->onUpdate('cascade')->onDelete('set null');
      $table->string('address', 55);
      $table->string('phone', 12);
      $table->string('email', 40);
      $table->text('curriculum');
      $table->text('photo');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('collaborators');
  }
};
