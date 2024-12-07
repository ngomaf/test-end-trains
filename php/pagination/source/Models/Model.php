<?php

namespace Source\Models;

use Source\Models\Connection;


class Model extends Connection
{
    function __construct(protected Connection $db=new Connection) {}
}