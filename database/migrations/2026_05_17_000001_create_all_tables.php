<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1. Settings Table (Key-Value)
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // 2. Menu Items Table
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('page');
            $table->boolean('v')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 3. Services Table
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon')->default('fa-tools');
            $table->string('short')->nullable();
            $table->text('desc')->nullable();
            $table->text('feats')->nullable();
            $table->text('img')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        // 4. Offers Table
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('oldP')->nullable();
            $table->string('newP');
            $table->text('feats')->nullable();
            $table->boolean('feat')->default(false);
            $table->string('status')->default('active');
            $table->timestamps();
        });

        // 5. Testimonials Table
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city')->nullable();
            $table->integer('rating')->default(5);
            $table->string('svc')->nullable();
            $table->text('text')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        // 6. Gallery Table
        Schema::create('gallery', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cat');
            $table->string('type')->default('after');
            $table->string('icon')->default('fa-image');
            $table->text('img')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });

        // 7. FAQs Table
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('q');
            $table->text('a');
            $table->timestamps();
        });

        // 8. Why Choose Us Items
        Schema::create('why_items', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->default('fa-check');
            $table->string('title');
            $table->string('desc')->nullable();
            $table->text('img')->nullable();
            $table->timestamps();
        });

        // 9. Work Steps Table
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->string('num');
            $table->string('icon')->default('fa-star');
            $table->string('title');
            $table->string('desc')->nullable();
            $table->text('img')->nullable();
            $table->timestamps();
        });

        // 10. Service Areas Table
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('emoji')->default('📍');
            $table->text('desc')->nullable();
            $table->text('kws')->nullable();
            $table->timestamps();
        });

        // 11. Articles / Blogs Table
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cat')->nullable();
            $table->string('summary')->nullable();
            $table->text('content')->nullable();
            $table->text('img')->nullable();
            $table->string('status')->default('published');
            $table->string('date')->nullable();
            $table->timestamps();
        });

        // 12. Requests Table
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('service')->nullable();
            $table->string('btype')->nullable();
            $table->string('area')->nullable();
            $table->text('notes')->nullable();
            $table->string('reqDate')->nullable();
            $table->string('reqTime')->nullable();
            $table->string('status')->default('new');
            $table->string('date')->nullable();
            $table->timestamps();
        });

        // 13. Messages Table
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('city')->nullable();
            $table->string('subject')->nullable();
            $table->text('msg')->nullable();
            $table->string('date')->nullable();
            $table->boolean('replied')->default(false);
            $table->timestamps();
        });

        // 14. Click Logs Table
        Schema::create('clicks', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('page')->nullable();
            $table->string('time')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clicks');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('requests');
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('steps');
        Schema::dropIfExists('why_items');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('gallery');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('offers');
        Schema::dropIfExists('services');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('settings');
    }
};
