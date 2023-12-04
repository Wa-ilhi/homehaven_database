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
        Schema::create('real_estate', function (Blueprint $table) {
            $table->id('real_estate_id');
            $table->string('type');
            $table->string('city');
            $table->string('zipcode');
            $table->timestamps();
        });

        Schema::table('real_estate', function (Blueprint $table) {
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->references('property_id')->on('real_estate_properties');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estate');
    }
};
