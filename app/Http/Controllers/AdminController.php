<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Services\SettingService;
use App\Services\ContentService;

class AdminController extends Controller
{
    protected AdminService $adminService;
    protected SettingService $settingService;
    protected ContentService $contentService;

    public function __construct(
        AdminService $adminService,
        SettingService $settingService,
        ContentService $contentService
    ) {
        $this->adminService = $adminService;
        $this->settingService = $settingService;
        $this->contentService = $contentService;
    }

    public function index()
    {
        $requestsCount = \App\Models\Request::where('status', 'new')->count();
        $messagesCount = \App\Models\Message::where('replied', false)->count();
        $servicesCount = \App\Models\Service::where('status', 'active')->count();
        $clicksCount = \App\Models\Click::count();

        $recentRequests = \App\Models\Request::orderBy('id', 'desc')->take(5)->get();
        $recentMessages = \App\Models\Message::orderBy('id', 'desc')->take(5)->get();

        $whatsappClicks = \App\Models\Click::where('type', 'whatsapp')->count();
        $phoneClicks = \App\Models\Click::where('type', 'phone')->count();
        $requestClicks = \App\Models\Click::where('type', 'request')->count();

        return view('admin.dashboard', compact(
            'requestsCount', 'messagesCount', 'servicesCount', 'clicksCount',
            'recentRequests', 'recentMessages',
            'whatsappClicks', 'phoneClicks', 'requestClicks'
        ));
    }

    /**
     * Display the Admin Login Screen.
     */
    public function login()
    {
        if (\Illuminate\Support\Facades\Auth::check()) {
            return redirect('/admin');
        }
        return view('admin.login');
    }

    /**
     * Handle Admin Login Request.
     */
    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $credentials['username'];
        $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (\Illuminate\Support\Facades\Auth::attempt([$field => $username, 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'بيانات خاطئة'], 401);
    }

    /**
     * Handle Admin Logout.
     */
    public function logout(Request $request)
    {
        \Illuminate\Support\Facades\Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

    /**
     * Display the Settings Control Panel.
     */
    public function settings()
    {
        $hero = $this->settingService->get('hero');
        $hdr = $this->settingService->get('hdr');
        $ftr = $this->settingService->get('ftr');
        $contact = $this->settingService->get('contact');
        $colors = $this->settingService->get('colors');
        $about = $this->settingService->get('about');
        $menus = \App\Models\Menu::orderBy('order')->get();

        return view('admin.settings.index', compact(
            'hero', 'hdr', 'ftr', 'contact', 'colors', 'about', 'menus'
        ));
    }

    /**
     * Services CRUD dashboard view.
     */
    public function services()
    {
        $services = \App\Models\Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Offers CRUD dashboard view.
     */
    public function offers()
    {
        $offers = \App\Models\Offer::all();
        return view('admin.offers.index', compact('offers'));
    }

    /**
     * Areas CRUD dashboard view.
     */
    public function areas()
    {
        $areas = \App\Models\Area::all();
        return view('admin.areas.index', compact('areas'));
    }

    /**
     * Testimonials CRUD dashboard view.
     */
    public function testimonials()
    {
        $testimonials = \App\Models\Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * FAQs CRUD dashboard view.
     */
    public function faqs()
    {
        $faqs = \App\Models\Faq::all();
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Gallery CRUD dashboard view.
     */
    public function gallery()
    {
        $gallery = \App\Models\Gallery::all();
        return view('admin.gallery.index', compact('gallery'));
    }

    /**
     * Blogs CRUD dashboard view.
     */
    public function blogs()
    {
        $blogs = \App\Models\Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Quotation Requests list view.
     */
    public function requests()
    {
        $requests = \App\Models\Request::orderBy('id', 'desc')->get();
        return view('admin.requests.index', compact('requests'));
    }

    /**
     * Customer Feedback Messages list view.
     */
    public function messages()
    {
        $messages = \App\Models\Message::orderBy('id', 'desc')->get();
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Save dynamic settings (hero, headers, footers, contacts).
     */
    public function saveSetting(Request $request, string $key)
    {
        $value = $request->all();
        $this->adminService->saveSetting($key, $value);
        return response()->json(['success' => true, 'message' => 'Settings saved successfully']);
    }

    /**
     * Save/Update CRUD dynamic content items.
     */
    public function saveContent(Request $request, string $type)
    {
        $id = $request->input('id') ?: null;
        $data = $request->except(['id']);
        $item = $this->adminService->saveContent($type, $data, $id);
        return response()->json(['success' => true, 'item' => $item]);
    }

    /**
     * Delete CRUD dynamic content items.
     */
    public function deleteContent(string $type, int $id)
    {
        $success = $this->adminService->deleteContent($type, $id);
        return response()->json(['success' => $success]);
    }

    /**
     * Reorder dynamic menu listings.
     */
    public function reorderMenu(Request $request)
    {
        $ids = $request->input('ids', []);
        $this->adminService->reorderMenu($ids);
        return response()->json(['success' => true]);
    }

    /**
     * Update customer request validation status.
     */
    public function updateRequestStatus(Request $request, int $id)
    {
        $status = $request->input('status', 'new');
        $success = $this->adminService->updateRequestStatus($id, $status);
        return response()->json(['success' => $success]);
    }

    /**
     * Delete quotation request entry.
     */
    public function deleteRequest(int $id)
    {
        $success = $this->adminService->deleteRequest($id);
        return response()->json(['success' => $success]);
    }

    /**
     * Update customer feedback message replied status.
     */
    public function updateMessageReply(Request $request, int $id)
    {
        $replied = filter_var($request->input('replied', true), FILTER_VALIDATE_BOOLEAN);
        $success = $this->adminService->updateMessageReply($id, $replied);
        return response()->json(['success' => $success]);
    }

    /**
     * Delete customer feedback message log.
     */
    public function deleteMessage(int $id)
    {
        $success = $this->adminService->deleteMessage($id);
        return response()->json(['success' => $success]);
    }

    /**
     * Upload an image from the client device to the server uploads folder.
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
        ]);

        if ($request->hasFile('image')) {
            $url = $this->adminService->uploadImage($request->file('image'));
            return response()->json(['success' => true, 'url' => $url]);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
    }

    /**
     * Fetch the requests, messages, and click logs report.
     */
    public function getLogs()
    {
        return response()->json($this->adminService->getLogsReport());
    }

    /**
     * Retrieve the complete dynamic state (settings + items) for SPA hydration.
     */
    public function getState()
    {
        $settings = $this->settingService->getAllSettings();
        $content = $this->contentService->getFullState();
        return response()->json(array_merge($settings, $content));
    }
}
