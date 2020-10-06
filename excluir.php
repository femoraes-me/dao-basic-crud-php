<?php
require 'config.php';

$id = filter_input(INPUT_GET, 'id'); //recebendo id

//verificando se id existe
if($id) {

    //query de excluasao
    $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
    
}

//atualizando a home page
header("Location: index.php");
exit;
?>