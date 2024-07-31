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
    Schema::create('intelligences', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger("register");
      $table->string("name");
      $table->foreignId("status_id")->default(1)->nullable()->constrained("states_names", "id")->onUpdate("cascade")->onDelete("set null");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('intelligences');
  }
};
