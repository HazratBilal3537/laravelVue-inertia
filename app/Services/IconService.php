<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class IconService
{
    protected string $iconPath;

    public function __construct()
    {
        $this->iconPath = base_path('node_modules/@mdi/js/mdi.js');
    }

    public function get(string $icon): ?string
    {
        $icon = str($icon)->start('mdi-')->camel()->trim()->value;

        return Cache::rememberForever('mdi_icon_'.$icon, function () use ($icon) {
            $handle = fopen($this->iconPath, 'r');
            if (! $handle) {
                return $this->fallback();
            }

            $found = null;
            while (! feof($handle) && empty($found)) {
                $buffer = fgets($handle);
                if (strpos($buffer, $icon) !== false) {
                    $found = $this->getIconPathFromLine($buffer);
                }
            }
            fclose($handle);

            return $found;
        });
    }

    private function fallback(): string
    {
        return '';
    }

    private function getIconPathFromLine($line)
    {
        $pattern = "/[\"'](.*?)[\"']/";
        preg_match($pattern, $line, $matches);

        return isset($matches[1]) ? $matches[1] : $this->fallback();
    }
}
