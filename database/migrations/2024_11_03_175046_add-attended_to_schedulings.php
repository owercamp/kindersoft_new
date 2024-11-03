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
    Schema::table('schedulings', function (Blueprint $table) {
      $table->enum('attended', ['attended', 'not attended'])->nullable()->after('potential_customer_id');
      $table->text('observations', 510)->after('attended');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('schedulings', function (Blueprint $table) {
      $table->dropColumn('attended');
      $table->dropColumn('observations');
    });
  }
};
