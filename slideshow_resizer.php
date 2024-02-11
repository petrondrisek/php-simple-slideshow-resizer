<?php

$images = glob("*.webp");

$newWidths = [575, 1024, 1366, 1620];
foreach($images as $image){
    list($width, $height) = getimagesize($image);

    foreach($newWidths as $newwidth){
        $createimage = imagecreatefromwebp($image);
        $newheight = $height*($newwidth/$width);
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $createimage, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        imagewebp($dst, "./".$newwidth."px/".$image);
    }
}