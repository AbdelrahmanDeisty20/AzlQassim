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
        Schema::table('gallery', function (Blueprint $table) {
            $table->string('video')->nullable()->after('img');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('video')->nullable()->after('text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallery', function (Blueprint $table) {
            $table->dropColumn('video');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('video');
        });
    }
};
