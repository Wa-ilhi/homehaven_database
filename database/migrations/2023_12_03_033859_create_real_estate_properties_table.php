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
        Schema::create('real_estate_properties', function (Blueprint $table) {
            $table->id('property_id');
            $table->string('property_type');
            $table->string('address');
            $table->string('status');
            $table->integer('squarefootage');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->decimal('listing_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estate_properties');
    }
};
