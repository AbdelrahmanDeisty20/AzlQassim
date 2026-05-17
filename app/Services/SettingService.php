<?php

namespace App\Services;

use App\Models\Setting;

class SettingService
{
    public function get(string $key, array $default = []): array
    {
        $setting = Setting::where('key', $key)->first();
        return $setting ? ($setting->value ?? $default) : $default;
    }

    public function set(string $key, array $value): Setting
    {
        return Setting::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    public function getAllSettings(): array
    {
        $keys = ['hero', 'hdr', 'ftr', 'contact', 'colors', 'about'];
        $settings = [];
        foreach ($keys as $key) {
            $settings[$key] = $this->get($key);
        }
        return $settings;
    }
}
