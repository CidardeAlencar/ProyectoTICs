<?php
session_start();
$_A = '';
$_B = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$_C = 5;
for ($_D = 0; $_D < $_C; $_D++) {
    $_A .= $_B[rand(0, strlen($_B) - 1)];
}
$_SESSION['captcha'] = $_A;
header('Content-Type: image/png');
$_E = imagecreatetruecolor(150, 50);
$_F = imagecolorallocate($_E, 255, 255, 255);
$_G = imagecolorallocate($_E, 0, 0, 0);
$_H = imagecolorallocate($_E, 64, 64, 64);
$_I = imagecolorallocate($_E, 0, 0, 255);
imagefilledrectangle($_E, 0, 0, 150, 50, $_F);
for ($_J = 0; $_J < 6; $_J++) {
    imageline($_E, 0, rand() % 50, 150, rand() % 50, $_H);
}
for ($_K = 0; $_K < 1000; $_K++) {
    imagesetpixel($_E, rand() % 150, rand() % 50, $_I);
}
imagestring($_E, 5, 35, 15, $_A, $_G);
imagepng($_E);
imagedestroy($_E);
?>
