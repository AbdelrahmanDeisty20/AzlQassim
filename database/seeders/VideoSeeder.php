<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Video Gallery (17 Work Videos)
        $gallery = [
            [
                'id' => 9,
                'title' => 'فيديو عملية الرش بالفوم الأمريكي - حي الريان',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.41 PM.mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 10,
                'title' => 'فيديو اختبار عزل المياه للسطح - حي الصفراء',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.42 PM (1).mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 11,
                'title' => 'فيديو عزل خزان مياه أرضي خرساني',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.42 PM (2).mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 12,
                'title' => 'فيديو كشف تسربات المياه بجهاز الذبذبات',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.42 PM.mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 13,
                'title' => 'خطوات تطبيق عزل الفوم الحراري والمائي',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.43 PM (1).mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 14,
                'title' => 'فيديو عزل فوم لأسطح هناجر ومستودعات',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.43 PM (2).mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 15,
                'title' => 'عزل مائي شينكو فوم أمريكي ببريدة',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.43 PM.mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 16,
                'title' => 'فيديو معالجة تشققات الأسطح قبل العزل',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.44 PM.mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 17,
                'title' => 'فيديو اختبار ضغط شبكة المياه وكشف التسرب',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.45 PM.mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 18,
                'title' => 'تطبيق العازل الأسمنتي للخزانات والحمامات',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.46 PM (1).mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 20,
                'title' => 'رش البولي يوريثان فوم لحماية السطح',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.46 PM.mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 21,
                'title' => 'فيديو اختبار عزل الأسطح بعد سقوط الأمطار',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.47 PM (1).mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 22,
                'title' => 'فيديو كشف تسربات وعزل حمامات الفلل',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.47 PM (2).mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 23,
                'title' => 'عزل فوم حراري للأسطح الخرسانية بعنيزة',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.47 PM.mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 24,
                'title' => 'كشف تسربات المياه بأحدث أجهزة الصوت',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.48 PM (1).mp4',
                'color' => '#0f2441'
            ],
            [
                'id' => 25,
                'title' => 'عزل مائي متكامل لأسطح الفلل السكنية بالرس',
                'cat' => 'فيديو',
                'type' => 'after',
                'icon' => 'fa-video',
                'img' => '',
                'video' => '/assets/WhatsApp Video 2026-05-18 at 1.53.48 PM.mp4',
                'color' => '#0f2441'
            ]
        ];
        foreach ($gallery as $g) {
            Gallery::updateOrCreate(['id' => $g['id']], $g);
        }
    }
}
