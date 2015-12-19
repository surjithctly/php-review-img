<?php

/*
 *
 * Embed Reviews for Envato Market
 * by Surjith S M (tf.net/u/surjithctly)
 *
 */

// Get Values from @params

$text   = $_GET['text'];
$user   = $_GET['user'];
$height = $_GET['height'];

// Set font Size
$font_size = 11;

//Set the Content Type
header('Content-type: image/jpeg');

// Create Image  
$jpg_image = imagecreatetruecolor(616, $height + 25);

// Get Star Image
$star_image = imagecreatefromjpeg('star.jpg');

// Set Path to Font File
$font_path = 'OpenSans-Regular.ttf';

$white = imagecolorallocate($jpg_image, 255, 255, 255);

imagefill($jpg_image, 0, 0, $white);

imagefilledrectangle($jpg_image, 0, 0, 616, $height, imagecolorallocate($jpg_image, 230, 230, 230));

// Allocate A Color For The Text
$font_color = imagecolorallocate($jpg_image, 0, 0, 0);

$link_color = imagecolorallocate($jpg_image, 0, 132, 180);

imagefilledrectangle($jpg_image, 0, 0, 616, 44, imagecolorallocate($jpg_image, 245, 245, 245));

// Five Stars.. yay!!
imagecopy($jpg_image, $star_image, 500, 17, 0, 0, 13, 12);
imagecopy($jpg_image, $star_image, 518, 17, 0, 0, 13, 12);
imagecopy($jpg_image, $star_image, 536, 17, 0, 0, 13, 12);
imagecopy($jpg_image, $star_image, 554, 17, 0, 0, 13, 12);
imagecopy($jpg_image, $star_image, 572, 17, 0, 0, 13, 12);


// Print Text On Image
imagettftext($jpg_image, 12, 0, 20, 30, $link_color, $font_path, $user);

// Multiline Text
$lines = explode('|', wordwrap($text, 80, '|'));

// Starting Y position
$y = 80;

// Loop through the lines and place them on the image
foreach ($lines as $line) {
    imagettftext($jpg_image, $font_size, 0, 20, $y, $font_color, $font_path, $line);
    
    // Increment Y so the next line is below the previous line
    $y += 25;
}


// Send Image to Browser
imagejpeg($jpg_image, NULL, 100);

// Clear Memory
imagedestroy($jpg_image);
imagedestroy($star_image);

?>