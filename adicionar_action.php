<?php

require 'config.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($name && $email) {

    //verificar se email ja está cadastrado
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() == 0) {
        //inserção de usuário no banco de dados
        $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->execute();

        //voltar para index
        header("LOCATION: index.php");
        exit;
    } else {
        //voltar para formulário de cadastro
        header("LOCATION: adicionar.php");
        exit;
    }

} else {
    //voltar para formulário de cadastro
    header("LOCATION: adicionar.php");
    exit;
}