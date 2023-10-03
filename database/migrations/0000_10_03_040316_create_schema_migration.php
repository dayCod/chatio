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
        // Drop If Exists Schema
        DB::statement('DROP SCHEMA IF EXISTS broadcasting CASCADE');

        // Create Schema
        DB::statement('CREATE SCHEMA broadcasting');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 
    }
};
