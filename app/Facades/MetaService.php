<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Services\MetaService setTitle(string $title)
 * @method static string getTitle()
 *
 * @see \App\Services\MetaService
 */
class MetaService extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return \App\Services\MetaService::class;
    }
}
