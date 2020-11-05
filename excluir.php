<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo); //instaciando o objeto

$id = filter_input(INPUT_GET, 'id'); //recebendo id

//verificando se id existe
if($id) {
    $usuarioDao->delete($id); 
}

//atualizando a home page
header("Location: index.php");
exit;
?>