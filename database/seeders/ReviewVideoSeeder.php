<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class ReviewVideoSeeder extends Seeder
{
    /**
     * Video-only testimonials — no text, no rating, no name.
     */
    public function run(): void
    {
        // Remove old placeholder video testimonials (IDs 4 & 5)
        Testimonial::whereIn('id', [4, 5])->delete();

        // Seed only the real review video from C:\review
        Testimonial::updateOrCreate(['id' => 6], [
            'id'     => 6,
            'name'   => null,
            'city'   => null,
            'rating' => null,
            'svc'    => 'فيديو',
            'text'   => null,
            'video'  => '/assets/WhatsApp Video 2026-05-18 at 2.04.52 PM.mp4',
            'status' => 'active',
        ]);
    }
}
