<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string get(string $icon)
 * @method static string fallback()
 * @method static void getIconPathFromLine( $line)
 *
 * @see \App\Services\IconService
 */
class IconService extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return \App\Services\IconService::class;
    }
}
