<?php
header("Content-Type: image/png");
$im = @imagecreate(500, 100)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 0, 0, 0);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5,  $_SERVER['REMOTE_ADDR'], $text_color);
imagepng($im);
imagedestroy($im);
?>
