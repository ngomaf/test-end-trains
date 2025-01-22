<?php

namespace resources\libraries;


class Validate
{
    public static function get(array $fields, array $data) {
            
        $validate = [];

        foreach($fields as $field => $type) {

            $value = trim($data[$field]);

            switch($type) {
                case 's':
                    $validate[$field] = filter_var($value, FILTER_SANITIZE_STRING); // or FILTER_SANITIZE_FULL_SPECIAL_CHARS
                    break;
                case 'i':
                    $validate[$field] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
                    break;
                case 'e':
                    $validate[$field] = filter_var($value, FILTER_SANITIZE_EMAIL);
                    break;
                case 'b':
                    $validate[$field] = ($data[$field]=='on')? 1: 0;
                    break;
                case '*':
                    $validate[$field] = $data[$field];
                    break;
            }
        }

        return $validate;
    }

}