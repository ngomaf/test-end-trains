<?php

namespace src\controllers;

use resources\libraries\Controller;

class AboutController extends Controller
{
    function index():void {
        $this->view->render('about');
    }
}