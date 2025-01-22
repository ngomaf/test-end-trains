<?php

use resources\libraries\Validate;
use src\models\Notice;

require "../../config.php";

sleep(1); // pode remover é apenas para testar tempo de espera


$slug = Validate::get([
    "slug" => "s",
], $_GET);

$notice = new Notice;

echo json_encode($notice->findBySlug($slug['slug']));