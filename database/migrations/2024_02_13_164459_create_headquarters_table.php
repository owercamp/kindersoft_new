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
        Schema::create('headquarters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('general_information', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('headquarters', 100);
            $table->foreignId('country_id')->nullable()->constrained('countries', 'id')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('department_id')->nullable()->constrained('departaments', 'id')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('municipality_id')->nullable()->constrained('municipalities', 'id')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('city_id')->nullable()->constrained('cities', 'id')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('neighborhood_id')->nullable()->constrained('neighborhoods', 'id')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('postal_id')->nullable()->constrained('postals', 'id')->onUpdate('cascade')->onDelete('set null');
            $table->string('address', 150);
            $table->string('phone', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headquarters');
    }
};
