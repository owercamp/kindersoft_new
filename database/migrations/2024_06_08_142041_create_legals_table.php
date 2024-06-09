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
    Schema::create('legals', function (Blueprint $table) {
      $table->id();
      $table->string('nit', 17);
      $table->string('company_name', 50);
      $table->string('address', 50);
      $table->foreignId('country_id')->nullable()->constrained('countries', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('department_id')->nullable()->constrained('departaments', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('municipality_id')->nullable()->constrained('municipalities', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('city_id')->nullable()->constrained('cities', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('neighborhood_id')->nullable()->constrained('neighborhoods', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->foreignId('postal_id')->nullable()->constrained('postals', 'id')->onUpdate('cascade')->onDelete('set null');
      $table->string('phone', 10);
      $table->string('email', 50);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('legals');
  }
};
