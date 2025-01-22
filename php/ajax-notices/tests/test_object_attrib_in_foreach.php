<?php

// VALIDATE

$_POST = [
    'title' => '<scipt>Angola cão acção em foco</scipt>',
    'category' => '1',
    'email' => 'ngomafortuna@gmail.com',
    'content' => '<p>Many PHP developers need to send email from their code. The only PHP function that supports this directly is mail(). However, it does not provide any assistance for making use of popular features such as encryption, authentication, HTML messages, and attachments.</p><p>Formatting email correctly is surprisingly difficult. There are myriad overlapping (and conflicting) standards, requiring tight adherence to horribly complicated formatting and encoding rules – the vast majority of code that you',
    'state' => 'on'
];

function validate(array $fields) {
    $validate = [];

    foreach($fields as $field => $type) {
        switch($type) {
            case 's':
                $validate[$field] = filter_var($_POST[$field], FILTER_SANITIZE_STRING);
                // FILTER_SANITIZE_SPECIAL_CHARS
                // FILTER_SANITIZE_FULL_SPECIAL_CHARS
                break;
            case 'i':
                $validate[$field] = filter_var($_POST[$field], FILTER_SANITIZE_NUMBER_INT);
                break;
            case 'e':
                $validate[$field] = filter_var($_POST[$field], FILTER_SANITIZE_EMAIL);
                break;
        }
    }

    return $validate;
}

$validate = validate([
    'title' => 's',
    'category' => 'i',
    'email' => 'e',
    'content' => 's'
]);

var_dump($validate);