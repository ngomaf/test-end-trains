<?php

use resources\libraries\Validate;
use src\models\Notice;

require "../../config.php";

sleep(1); // pode remover é apenas para testar tempo de espera


$_POST['slug'] = implode("-", explode(" ", $_POST['title']));
$_POST['fk_category_idCat'] = $_POST['category'];
$_POST['image'] = 'img-5.jpg';

// validation
$formData = Validate::get([
    'title' => 's',
    'slug' => 's',
    'fk_category_idCat' => 'i',
    'content' => 's',
    'state' => 'b',
    'image' => '*'
], $_POST);


$notice = new Notice;

echo json_encode($notice->create($formData));
