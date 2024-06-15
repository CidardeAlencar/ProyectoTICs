<?php
session_start();

// Generar código CAPTCHA de 5 caracteres
$captcha_code = '';
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$length = 5;
for ($i = 0; $i < $length; $i++) {
    $captcha_code .= $characters[rand(0, strlen($characters) - 1)];
}

$_SESSION['captcha'] = $captcha_code;

header('Content-Type: image/png');

$image = imagecreatetruecolor(150, 50);
$background_color = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);
$line_color = imagecolorallocate($image, 64, 64, 64);
$pixel_color = imagecolorallocate($image, 0, 0, 255);

imagefilledrectangle($image, 0, 0, 150, 50, $background_color);

// Añadir líneas de ruido
for ($i = 0; $i < 6; $i++) {
    imageline($image, 0, rand() % 50, 150, rand() % 50, $line_color);
}

// Añadir píxeles de ruido
for ($i = 0; $i < 1000; $i++) {
    imagesetpixel($image, rand() % 150, rand() % 50, $pixel_color);
}

// Añadir el texto del CAPTCHA usando una fuente interna de PHP
imagestring($image, 5, 35, 15, $captcha_code, $text_color);

imagepng($image);
imagedestroy($image);
?>
