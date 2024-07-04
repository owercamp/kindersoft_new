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
      $table->foreignId('type_identification_id')->nullable()->constrained('type_identifications', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->string('number_document');
      $table->string('firstname');
      $table->string('middlename')->nullable();
      $table->string('lastname');
      $table->string('middlelastname')->nullable();
      $table->foreignId('country_id')->nullable()->constrained('countries', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('department_id')->nullable()->constrained('departaments', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('municipality_id')->nullable()->constrained('municipalities', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('city_id')->nullable()->constrained('cities', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('location_id')->nullable()->constrained('neighborhoods', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('postal_id')->nullable()->constrained('postals', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->string('address');
      $table->string('phone');
      $table->string('email');
      $table->foreignId('nationality_id')->nullable()->constrained('countries', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('genre_id')->nullable()->constrained('genres', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->string('genre_text')->nullable();
      $table->foreignId('academic_id')->nullable()->constrained('academic_levels', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->string('academic_text')->nullable();
      $table->foreignId('bloodtype_id')->nullable()->constrained('bloodtypes', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('status_id')->constrained('states_names','id')->onUpdate('cascade')->onDelete('no action')->default(1);
      $table->enum('contract', ['DEPENDIENTE', 'INDEPENDIENTE']);
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
