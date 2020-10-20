<?php

require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo); //instaciando o objeto


$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($name && $email) {

    if($usuarioDao->findByEmail($email) === false) {
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name);
        $novoUsuario->setEmail($email);

        $usuarioDao->add( $novoUsuario );

        header("LOCATION: index.php");
        exit;
    } else {
        header("LOCATION: adicionar.php");
        exit;  
    }
} else {
    //voltar para formulário de cadastro
    header("LOCATION: adicionar.php");
    exit;
}