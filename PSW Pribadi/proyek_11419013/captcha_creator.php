<?php
    session_start();
    header ("Content-type: image/png");
    if (isset($_SESSION['my_captcha']))
    { unset($_SESSION['my_captcha']); }

    $string1 = "abcdefghijklmnopqrstuvwxyz";
    $string2 = "1234567890";
    $string = $string1.$string2;
    $string = str_shuffle($string);
    $random_text = substr($string,0,8);

    $_SESSION['my_captcha'] = $random_text;
    $string = $_SESSION['my_captcha'];
    $im = @ImageCreate (97, 20)
    or die ("Cannot Initalize new GD image stream");
    $background_color = ImageColorAllocate ($im, 204, 204, 250);
    $text_color = ImageColorAllocate($im, 0, 0, 0);
    ImageString($im, 5, 13, 2, $string, $text_color);
    ImagePng ($im);
    imagedestroy($im);
?>