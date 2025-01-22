<?php

use resources\libraries\Validate;
use src\models\Notice;

require "../../config.php";

sleep(1); // pode remover é apenas para testar tempo de espera


$phrase = Validate::get([
    'phrase' => 's'
], $_POST);

$notice = new Notice;

$result = $notice->search($phrase['phrase']);

echo ($result)? json_encode($result): json_encode(['void' =>'null']);


// echo "ajax/search";