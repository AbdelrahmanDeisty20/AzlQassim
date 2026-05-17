<?php

namespace App\Services;

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

class ContentService
{
    public function getFullState(): array
    {
        return [
            'menu' => Menu::orderBy('order')->get()->toArray(),
            'services' => Service::all()->toArray(),
            'offers' => Offer::all()->toArray(),
            'testimonials' => Testimonial::all()->toArray(),
            'gallery' => Gallery::all()->toArray(),
            'faqs' => Faq::all()->toArray(),
            'whyItems' => WhyItem::all()->toArray(),
            'steps' => Step::all()->toArray(),
            'areas' => Area::all()->toArray(),
            'blogs' => Blog::all()->toArray(),
        ];
    }

    public function saveItem(string $type, array $data, ?int $id = null)
    {
        $modelClass = $this->getModelClass($type);
        if (!$modelClass) {
            throw new \InvalidArgumentException("Invalid content type: $type");
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

    public function deleteItem(string $type, int $id): bool
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

    public function reorderMenu(array $ids): void
    {
        foreach ($ids as $index => $id) {
            Menu::where('id', $id)->update(['order' => $index + 1]);
        }
    }

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
