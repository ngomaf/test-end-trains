<?php

namespace resources\libraries;

use resources\libraries\View;


abstract class Controller
{
    public function __construct(public View $view = new View) {}
    abstract protected function index():void;
}