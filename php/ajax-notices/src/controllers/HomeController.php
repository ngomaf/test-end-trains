<?php

namespace src\controllers;

use resources\libraries\Controller;
use src\models\Notice;


class HomeController extends Controller
{
    public function index():void {
        $notice = (new Notice)->all();
        $this->view->render('home', $notice);
    }

    public function test():void {
        var_dump("Hi Test from HomeController");
    }

    public function show(string $slug):void {
        var_dump("Hi {$slug}! I'm show from HomeController");
    }

    public function getprod(array $prods):void {
        $prods = implode(", ", $prods) . ".";
        var_dump("Hi $prods");
    }
}