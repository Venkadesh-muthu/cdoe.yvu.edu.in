<?php

namespace App\Services;

class CaptchaService
{
    private const SESSION_KEY = 'login_captcha';
    private const LENGTH = 6;
    private const TTL = 300;

    public function generate(): string
    {
        $code = $this->randomCode();

        session()->set(self::SESSION_KEY, [
            'hash' => password_hash(strtolower($code), PASSWORD_DEFAULT),
            'expires_at' => time() + self::TTL,
        ]);

        return $code;
    }

    public function verify(?string $input): bool
    {
        $captcha = session()->get(self::SESSION_KEY);
        session()->remove(self::SESSION_KEY);

        if (! is_array($captcha) || empty($captcha['hash']) || empty($captcha['expires_at'])) {
            return false;
        }

        if ((int) $captcha['expires_at'] < time()) {
            return false;
        }

        $input = strtolower(trim((string) $input));

        return $input !== '' && password_verify($input, $captcha['hash']);
    }

    public function image(): string
    {
        $code = $this->generate();

        $width = 180;
        $height = 52;
        $image = imagecreatetruecolor($width, $height);

        $background = imagecolorallocate($image, 246, 248, 252);
        $border = imagecolorallocate($image, 205, 214, 226);
        $text = imagecolorallocate($image, 34, 52, 75);
        $noise = imagecolorallocate($image, 115, 132, 155);
        $accent = imagecolorallocate($image, 49, 108, 244);

        imagefilledrectangle($image, 0, 0, $width, $height, $background);
        imagerectangle($image, 0, 0, $width - 1, $height - 1, $border);

        for ($i = 0; $i < 7; $i++) {
            imageline(
                $image,
                random_int(0, $width),
                random_int(0, $height),
                random_int(0, $width),
                random_int(0, $height),
                $i % 2 === 0 ? $accent : $noise
            );
        }

        for ($i = 0; $i < 120; $i++) {
            imagesetpixel($image, random_int(1, $width - 2), random_int(1, $height - 2), $noise);
        }

        $x = 18;
        for ($i = 0; $i < strlen($code); $i++) {
            imagestring($image, 5, $x, random_int(15, 23), $code[$i], $text);
            $x += random_int(22, 26);
        }

        ob_start();
        imagepng($image);
        $contents = (string) ob_get_clean();
        imagedestroy($image);

        return $contents;
    }

    private function randomCode(): string
    {
        $alphabet = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $code = '';

        for ($i = 0; $i < self::LENGTH; $i++) {
            $code .= $alphabet[random_int(0, strlen($alphabet) - 1)];
        }

        return $code;
    }
}
