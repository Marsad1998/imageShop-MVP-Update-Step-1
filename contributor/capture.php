<?php
    session_start();
    $text = rand(10000,99999);
	$_SESSION["captcha_code"] = $text;
    // $this->session->set_userdata('captchacode', $text);
    // App::Session()->set('captchacode', $text);
    $height = 25;
    $width = 50;
    $font_size = 12;

    $im = imagecreatetruecolor($width, $height);
    $textcolor = imagecolorallocate($im, 150, 150, 150);
    $bg = imagecolorallocate($im, 0, 0, 0);
    imagestring($im, $font_size, 5, 5, $text, $textcolor);
    imagecolortransparent($im, $bg);
    imagefill($im, 0, 0, $bg);
    // header("Content-type: image/png");
    imagepng($im, null,9);
    imagedestroy($im);
?>