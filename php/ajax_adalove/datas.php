<?php

header("Content-Type: application/json; charset=UTF-8");

$objecto = json_decode($_POST["objecto"], false);
// $objecto = json_decode('{"tabela": "aluno", "valor": 10}');

$servidor = "localhost";
$usuario = "root";
$password = "";
$db = "ajax";

// criar conexao
$conexao = new mysqli($servidor, $usuario, $password, $db);

if($conexao->connect_error) {
    die("Erro na conexao: "+$conexao->connect_error);
} else {
    // sucesso na conexao
    
    // consulta sql
    if($objecto->type == "show") {
        $sql = "SELECT * FROM aluno ORDER BY id DESC LIMIT 5";
    } else {
        $sql = "SELECT * FROM aluno WHERE id < $objecto->lastid ORDER BY id DESC LIMIT 5";
    }
    
    $resultado = $conexao->query($sql);
    $saida = array();
    $saida = $resultado->fetch_all();
    
    echo json_encode($saida);

}

$conexao->close();
