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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key constraint if it exists
            if (Schema::hasColumn('users', 'user_type_id')) {
                $table->dropForeign(['user_type_id']);
            }

            // Drop the column if it exists
            if (Schema::hasColumn('users', 'user_type_id')) {
                $table->dropColumn('user_type_id');
            }
        });
    }
};
