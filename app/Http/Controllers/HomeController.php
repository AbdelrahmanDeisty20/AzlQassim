<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SettingService;
use App\Services\ContentService;
use App\Models\Setting;
use App\Models\Service;
use App\Models\Offer;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\Faq;
use App\Models\WhyItem;
use App\Models\Step;
use App\Models\Area;
use App\Models\Blog;
use App\Models\Menu;

class HomeController extends Controller
{
    protected SettingService $settingService;
    protected ContentService $contentService;

    public function __construct(SettingService $settingService, ContentService $contentService)
    {
        $this->settingService = $settingService;
        $this->contentService = $contentService;
    }

    private function getCommonData()
    {
        $settings = $this->settingService->getAllSettings();
        return [
            'hdr' => $settings['hdr'] ?? [],
            'hero' => $settings['hero'] ?? [],
            'svc_page' => $settings['svc_page'] ?? [],
            'why_us' => $settings['why_us'] ?? [],
            'ftr' => $settings['ftr'] ?? [],
            'contact' => $settings['contact'] ?? [],
            'colors' => $settings['colors'] ?? [],
            'menus' => Menu::where('v', true)->orderBy('order')->get()
        ];
    }

    public function index()
    {
        $common = $this->getCommonData();
        $settings = $this->settingService->getAllSettings();
        
        $hero = $settings['hero'] ?? [];
        $about = $settings['about'] ?? [
            'img' => '',
            'icon' => 'fa-building',
            'title' => 'فريق عزل القصيم',
            'text1' => 'تأسست شركة عزل القصيم لتكون الشريك الأمين لأصحاب المنازل في منطقة القصيم وبريدة وحائل في مجال العزل المائي والحراري للأسطح والخزانات والحمامات.',
            'text2' => 'نستخدم أحدث تقنيات العزل العالمية: الفوم البولي يوريثان، العزل الإسفلتي، السيليكون المائي، وأغشية البيتومين المعدنية. فريقنا مدرب ومعتمد.',
            'text3' => 'نقدم ضماناً حقيقياً موثقاً يصل إلى 10 سنوات مع متابعة مجانية طوال فترة الضمان.'
        ];

        $services = Service::where('status', 'active')->get();
        $offers = Offer::where('status', 'active')->get();
        $testimonials = Testimonial::where('status', 'active')->get();
        $gallery = Gallery::all();
        $faqs = Faq::all();
        $whyItems = WhyItem::all();
        $steps = Step::all();
        $areas = Area::all();
        $blogs = Blog::where('status', 'published')->get();

        return view('pages.home', array_merge($common, compact(
            'hero', 'about', 'services', 'offers', 'testimonials', 
            'gallery', 'faqs', 'whyItems', 'steps', 'areas', 'blogs'
        )));
    }

    public function about()
    {
        $common = $this->getCommonData();
        $settings = $this->settingService->getAllSettings();
        $about = $settings['about'] ?? [
            'img' => '',
            'icon' => 'fa-building',
            'title' => 'فريق عزل القصيم',
            'text1' => 'تأسست شركة عزل القصيم لتكون الشريك الأمين لأصحاب المنازل في منطقة القصيم وبريدة وحائل في مجال العزل المائي والحراري للأسطح والخزانات والحمامات.',
            'text2' => 'نستخدم أحدث تقنيات العزل العالمية: الفوم البولي يوريثان، العزل الإسفلتي، السيليكون المائي، وأغشية البيتومين المعدنية. فريقنا مدرب ومعتمد.',
            'text3' => 'نقدم ضماناً حقيقياً موثقاً يصل إلى 10 سنوات مع متابعة مجانية طوال فترة الضمان.'
        ];
        return view('pages.about', array_merge($common, compact('about')));
    }

    public function services()
    {
        $common = $this->getCommonData();
        $services = Service::where('status', 'active')->get();
        return view('pages.services', array_merge($common, compact('services')));
    }

    public function serviceDetail($id)
    {
        $common = $this->getCommonData();
        $service = Service::findOrFail($id);
        $services = Service::where('status', 'active')->where('id', '!=', $id)->get();
        return view('pages.service_detail', array_merge($common, compact('service', 'services')));
    }

    public function areas()
    {
        $common = $this->getCommonData();
        $areas = Area::all();
        $services = Service::where('status', 'active')->get();
        return view('pages.areas', array_merge($common, compact('areas', 'services')));
    }

    public function gallery()
    {
        $common = $this->getCommonData();
        $gallery = Gallery::all();
        return view('pages.gallery', array_merge($common, compact('gallery')));
    }

    public function blog()
    {
        $common = $this->getCommonData();
        $blogs = Blog::where('status', 'published')->get();
        return view('pages.blog', array_merge($common, compact('blogs')));
    }

    public function contact()
    {
        $common = $this->getCommonData();
        return view('pages.contact', $common);
    }

    public function streamVideo(Request $request)
    {
        $path = $request->query('path');
        // Sanitize path to prevent directory traversal
        $path = str_replace(['..', '\\'], ['', '/'], $path);
        $path = ltrim($path, '/');
        
        $fullPath = public_path($path);
        
        if (empty($path) || !file_exists($fullPath) || is_dir($fullPath)) {
            abort(404);
        }
        
        $response = new \Symfony\Component\HttpFoundation\BinaryFileResponse($fullPath);
        \Symfony\Component\HttpFoundation\BinaryFileResponse::trustXSendfileTypeHeader();
        return $response;
    }
}
