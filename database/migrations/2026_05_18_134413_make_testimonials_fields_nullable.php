<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->integer('rating')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            $table->integer('rating')->default(5)->nullable(false)->change();
        });
    }
};
