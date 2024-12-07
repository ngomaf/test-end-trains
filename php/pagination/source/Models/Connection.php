<?php

namespace Source\Models;

use Exception;
use PDO;

class Connection
{
  private static $instance;

  public static function getInstance() {
      if(!isset(self::$instance)) {
          try {
              self::$instance = new PDO('mysql:host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME , DBUSER, DBPASS);
              self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
              self::$instance->exec("SET CHARACTER SET utf8");
          } catch (Exception $erros) {
              die("
                  Codigo do erro: # {$erros->getCode()}<br>
                  Mensagem: # {$erros->getMessage()}<br>
                  Arquivo: # {$erros->getFile()}<br>   
                  Linha do erro: # {$erros->getLine()}<br>   
              ");
          }
      }

      return self::$instance;

  }

  public static function prepare($sql) {
      return self::getInstance()->prepare($sql);
  }
}
