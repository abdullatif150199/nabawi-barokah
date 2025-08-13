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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('duration')->nullable();
            $table->date('departure_date')->nullable();
            $table->string('airline')->nullable();
            $table->text('detail')->nullable();
            $table->string('hotel_1')->nullable();
            $table->string('hotel_2')->nullable();
            $table->text('ziarah')->nullable();
            $table->string('acomodation')->nullable();
            $table->decimal('price', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
