<?php

namespace App\Controllers;

use App\Services\CaptchaService;

class CaptchaController extends BaseController
{
    public function image()
    {
        $captcha = new CaptchaService();

        return $this->response
            ->setHeader('Content-Type', 'image/png')
            ->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->setHeader('Pragma', 'no-cache')
            ->setBody($captcha->image());
    }
}
