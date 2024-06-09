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
    Schema::create('people', function (Blueprint $table) {
      $table->id();
      $table->foreignId('type_identification_id')->nullable()->constrained('type_identifications', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->string('document_number', 17);
      $table->string('first_name');
      $table->string('middle_name')->nullable();
      $table->string('last_name');
      $table->string('middle_last_name')->nullable();
      $table->string('address');
      $table->string('phone');
      $table->foreignId('country_id')->nullable()->constrained('countries', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('department_id')->nullable()->constrained('departaments', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('municipality_id')->nullable()->constrained('municipalities', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('city_id')->nullable()->constrained('cities', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('neighborhood_id')->nullable()->constrained('neighborhoods', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('postal_id')->nullable()->constrained('postals', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('provider_id')->nullable()->constrained('providers', 'id')->onUpdate('cascade')->onDelete('cascade');
      $table->string('email');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('people');
  }
};
