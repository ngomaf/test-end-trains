<?php

namespace resources\libraries;


class View {
    public function render(string $view, array|object $datas=[]):void {
        extract((array)$datas);
        require_once PATH . "/resources/views/{$view}.php";
    }
}