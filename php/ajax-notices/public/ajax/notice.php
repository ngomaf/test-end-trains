<?php

use src\models\Notice;

require "../../config.php";

sleep(1); // pode remover é apenas para testar tempo de espera

$notice = new Notice;

echo json_encode($notice->all());
