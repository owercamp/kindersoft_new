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
        Schema::create('calendar_headquarters', function (Blueprint $table) {
            $table->id();
            $table->integer('number_register');
            $table->foreignId('headquarter_id')->nullable()->constrained('headquarters', 'id')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('calendar_id')->nullable()->constrained('calendars', 'id')->onUpdate('cascade')->onDelete('set null');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendar_headquarters');
    }
};
