<?php

namespace App\Services;

use App\Models\Setting;
use App\Models\Menu;
use App\Models\Service;
use App\Models\Offer;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\Faq;
use App\Models\WhyItem;
use App\Models\Step;
use App\Models\Area;
use App\Models\Blog;
use App\Models\Request as CustomerRequest;
use App\Models\Message;
use App\Models\Click;
use Illuminate\Http\UploadedFile;

class AdminService
{
    /**
     * Save key-value settings.
     */
    public function saveSetting(string $key, array $value): Setting
    {
        return Setting::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    /**
     * Save dynamic content items.
     */
    public function saveContent(string $type, array $data, ?int $id = null)
    {
        $modelClass = $this->getModelClass($type);
        if (!$modelClass) {
            throw new \InvalidArgumentException("Invalid content type: $type");
        }

        // Cast boolean inputs
        if ($type === 'menu' && isset($data['v'])) {
            $data['v'] = filter_var($data['v'], FILTER_VALIDATE_BOOLEAN);
        }
        if ($type === 'offers' && isset($data['feat'])) {
            $data['feat'] = filter_var($data['feat'], FILTER_VALIDATE_BOOLEAN);
        }

        if ($id) {
            $item = $modelClass::find($id);
            if ($item) {
                $item->update($data);
                return $item;
            }
        }

        return $modelClass::create($data);
    }

    /**
     * Delete dynamic content items.
     */
    public function deleteContent(string $type, int $id): bool
    {
        $modelClass = $this->getModelClass($type);
        if (!$modelClass) {
            throw new \InvalidArgumentException("Invalid content type: $type");
        }

        $item = $modelClass::find($id);
        if ($item) {
            return (bool)$item->delete();
        }
        return false;
    }

    /**
     * Reorder navigation menus.
     */
    public function reorderMenu(array $ids): void
    {
        foreach ($ids as $index => $id) {
            Menu::where('id', $id)->update(['order' => $index + 1]);
        }
    }

    /**
     * Update quotation request status.
     */
    public function updateRequestStatus(int $id, string $status): bool
    {
        $req = CustomerRequest::find($id);
        if ($req) {
            return (bool)$req->update(['status' => $status]);
        }
        return false;
    }

    /**
     * Delete quotation request log.
     */
    public function deleteRequest(int $id): bool
    {
        $req = CustomerRequest::find($id);
        if ($req) {
            return (bool)$req->delete();
        }
        return false;
    }

    /**
     * Update customer message reply status.
     */
    public function updateMessageReply(int $id, bool $replied): bool
    {
        $msg = Message::find($id);
        if ($msg) {
            return (bool)$msg->update(['replied' => $replied]);
        }
        return false;
    }

    /**
     * Delete customer message.
     */
    public function deleteMessage(int $id): bool
    {
        $msg = Message::find($id);
        if ($msg) {
            return (bool)$msg->delete();
        }
        return false;
    }

    /**
     * Retrieve all requests, messages, and clicks reports for the dashboard logs.
     */
    public function getLogsReport(): array
    {
        return [
            'requests' => CustomerRequest::orderBy('id', 'desc')->get()->toArray(),
            'messages' => Message::orderBy('id', 'desc')->get()->toArray(),
            'clicks' => Click::orderBy('id', 'desc')->get()->toArray(),
        ];
    }

    /**
     * Upload an image to the local public directory.
     */
    public function uploadImage(UploadedFile $file): string
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('uploads');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);
        return '/uploads/' . $filename;
    }

    /**
     * Map slugs to content models.
     */
    protected function getModelClass(string $type): ?string
    {
        $map = [
            'services' => Service::class,
            'offers' => Offer::class,
            'testimonials' => Testimonial::class,
            'gallery' => Gallery::class,
            'faqs' => Faq::class,
            'whyItems' => WhyItem::class,
            'steps' => Step::class,
            'areas' => Area::class,
            'blogs' => Blog::class,
            'menu' => Menu::class,
        ];

        return $map[$type] ?? null;
    }
}
