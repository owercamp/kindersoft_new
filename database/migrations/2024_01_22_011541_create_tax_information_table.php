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
        Schema::create('tax_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tax_liability_id')->nullable()->constrained('regimes','id')->onUpdate('cascade')->onDelete('set null');
            $table->string('form_number',25);
            $table->string('prefix_number',5);
            $table->string('next_invoice',8);
            $table->string('from_number',8);
            $table->string('up_to_number',8);
            $table->date('effective_from');
            $table->date('validity_until');
            $table->text('note_1', 510);
            $table->text('note_2', 510);
            $table->string('statement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_information');
    }
};
