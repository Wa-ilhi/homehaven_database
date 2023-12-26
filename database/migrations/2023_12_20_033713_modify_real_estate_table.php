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
            // Drop the foreign key constraint


            // Drop the 'property_id' column
            $table->dropColumn('property_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('real_estate', function (Blueprint $table) {
            // Drop the foreign key constraint


            // Drop the 'property_id' column
            $table->dropColumn('property_id');
        });
    }
};
