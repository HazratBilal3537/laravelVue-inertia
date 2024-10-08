<?php

namespace App\Services;

/**
 * Functions relating to the page metadata
 */
class MetaService
{
    protected string $title = '';

    /**
     * Sets the title for the page
     */
    public function setTitle(string $title): MetaService
    {
        $this->title = trim($title);

        return $this;
    }

    /**
     * Retrieves the title for the page inside the template
     */
    public function getTitle(): string
    {
        return $this->title.' | '.config('app.name');
    }
}
