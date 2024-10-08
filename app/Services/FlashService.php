<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class FlashService
{
    /**
     * @param  string  $text  The main text content
     * @param  string  $title  An optional title for the message
     * @param  string  $type  Either success, error, info or warning
     */
    public function send(string $text, ?string $title = null, ?string $type = 'success'): void
    {
        $availableTypes = ['success', 'error', 'info', 'warning'];
        if (in_array($type, $availableTypes) === false) {
            throw new \Exception('Invalid flash message type ('.$type.'). Options are: '.implode(', ', $availableTypes));
        }

        Session::flash($type, [
            'title' => $title,
            'text' => $text,
        ]);
    }

    public function success(string $text, ?string $title = null)
    {
        $this->send($text, $title, 'success');
    }

    public function warning(string $text, ?string $title = null)
    {
        $this->send($text, $title, 'warning');
    }

    public function info(string $text, ?string $title = null)
    {
        $this->send($text, $title, 'info');
    }

    public function error(string $text, ?string $title = null)
    {
        $this->send($text, $title, 'error');
    }
}
