<?php

namespace resources\libraries;

use resources\libraries\Uri;
use src\controllers\HomeController;

class Route
{
    private object $uri;

    public function __construct() {
        $this->uri = Uri::get();

        match($this->uri->tam) {
            1 => $this->indexMethod($this->uri->uri),
            2 => $this->method($this->uri->uri),
            3 => $this->methodParam($this->uri->uri),
            default => $this->moreMethod($this->uri->uri)
        };
    }
        

    public function indexMethod(array $param) {
        if(empty($param[0])) {
            (new HomeController)->index();
            return;
        }
        $param = ucfirst($param[0]) . "Controller";
        $ctrl = "src\\controllers\\{$param}";
        (new $ctrl)->index();
    }

    public function method(array $param) {
        $param[0] = ucfirst($param[0]) . "Controller";
        $ctrl = "src\\controllers\\{$param[0]}";
        $object = new $ctrl;

        if(!method_exists($object, $param[1])) {
            throw new \Exception("Method {$param[1]} does not exist in objecto {$ctrl}.");
        }
        $object->{$param[1]}();
    }

    public function methodParam(array $param) {
        $param[0] = ucfirst($param[0]) . "Controller";
        $ctrl = "src\\controllers\\{$param[0]}";
        $object = new $ctrl;

        if(!method_exists($object, $param[1])) {
            throw new \Exception("Method {$param[1]} does not exist in objecto {$ctrl}.");
        }
        $object->{$param[1]}($param[2]);
    }

    public function moreMethod(array $param) {
        $param[0] = ucfirst($param[0]) . "Controller";
        $ctrl = "src\\controllers\\{$param[0]}";
        $object = new $ctrl;

        if(!method_exists($object, $param[1])) {
            throw new \Exception("Method {$param[1]} does not exist in objecto {$ctrl}.");
        }

        $params = [];
        for($i=2; $i<sizeof($param); $i++) {
            array_push($params, $param[$i]);
        }
        $object->{$param[1]}($params);
    }
}