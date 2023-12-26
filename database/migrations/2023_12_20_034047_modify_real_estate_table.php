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
        Schema::table('real_estate', function (Blueprint $table) {
            // Add the new foreign key column
            $table->unsignedBigInteger('property_id')->nullable();

            // Add the foreign key constraint
            $table->foreign('property_id')->references('property_id')->on('real_estate_properties');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
