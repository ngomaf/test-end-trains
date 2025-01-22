<?php

namespace src\controllers;

use resources\libraries\Controller;
use src\models\Notice;

class CrudController extends Controller
{
    function index():void {
        // dump((new Notice)->findBySlug('Teste-one'));

        $this->view->render('crud', [
            'categories' => (new Notice)->getCategories()
        ]);
    }

    function store() {
        $_POST['state'] = ($_POST['state'])? 1: 0;
        $_POST['slug'] = implode("-", explode(" ", $_POST['title']));
        $_POST['fk_category_idCat'] = (int)$_POST['category'];
        unset($_POST['category']);

        $result = (new Notice)->create($_POST);
        $this->index();
    }
}