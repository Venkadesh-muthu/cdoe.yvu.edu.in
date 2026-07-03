<?php

if (! function_exists('render_captcha')) {
    function render_captcha(string $idPrefix = 'login'): string
    {
        return view('components/captcha', [
            'idPrefix' => preg_replace('/[^a-zA-Z0-9_-]/', '-', $idPrefix),
        ]);
    }
}
