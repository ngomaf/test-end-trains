<style>
    img {padding: 10px; border-radius: 5px;}
</style>
<?php

use CoffeeCode\Cropper\Cropper;

require __DIR__ . "/vendor/autoload.php";

echo "upload_max_filesize: " . ini_get("upload_max_filesize");
echo "<hr/>";

echo "max_file_uploads: " . ini_get("max_file_uploads");
echo "<hr/>";

echo "post_max_size: " . ini_get("post_max_size");
echo "<hr/>";




$cropper = new Cropper("images/cachen");

$arrCache = [];

$images = [
    'prim' => 'img1.jpg',
    'segu' => 'img2.jpg',
    'terc' => 'img3.jpg',
    'quar' => 'img4.jpg',
    'quin' => 'img5.jpg',
];

foreach($images as $index => $val) {
    // $arrCache[$index] = $cropper->make("images/newimg/{$val}", 300, 300);
}

$cropper->flush();

foreach($arrCache as $val):
?>

    <!-- <img src="<?= $val ?>"> -->

<?php 
endforeach;

// die();

$cropper = new Cropper("images/cache");

for($img = 1; $img < 5; $img++):
?>

    <div>
        <!-- <img style="width: 100%;" src="images/img<?= $img ?>.jpg" alt="img<?= $img ?>.jpg"> -->
        <img src="<?= $cropper->make("images/img{$img}.jpg", 300, 300) ?>" alt="img<?= $img ?>.jpg">     
    </div>

<?php 
endfor; 


// $cropper->flush("img1.jpg");
$cropper->flush();

?>