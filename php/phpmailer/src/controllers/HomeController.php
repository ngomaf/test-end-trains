<?php

namespace src\controllers;

use src\classes\ContactEmail;

class HomeController
{
    public function index() {
        return ('HomeController->index');
    }

    public function send(array $data) {

        try {
            $contactEmail = new ContactEmail;
    
            $contactEmail->setTo(['email'=>'ngomafortuna@gmail.com', 'name'=>'Ngoma']);
            $contactEmail->setFrom(['email'=>'ngomafortuna@gmail.com', 'name'=>'Ngoma']);
            $contactEmail->setSubject($data['subject']);
            $contactEmail->setMessage($data['message']);
            $contactEmail->setAttachment('file');

            return $contactEmail->send();
        } catch (\Throwable $th) {
            dd($th); // ou $contactEmail->ErrorInfo
        }

    }
}