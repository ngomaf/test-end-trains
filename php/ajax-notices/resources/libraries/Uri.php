<?php

namespace resources\libraries;


class Uri
{
    public static function get() {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');
        $uri = explode("/", $uri, FILTER_SANITIZE_URL);
        $tam = count($uri);

        return (object) ['tam'=>$tam, 'uri'=>$uri];
    }
}