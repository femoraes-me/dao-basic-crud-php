<?php

require 'config.php'; //importação de arquivo de configuração
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo); //instaciando o objeto

$lista = $usuarioDao->findAll(); //array para usuarios

?>

<a href="adicionar.php">ADICIONAR USUARIO</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach($lista as $usuario): ?>
        <tr>
            <td> <?=$usuario->getId();?> </td>
            <td> <?=$usuario->getNome();?> </td>
            <td> <?=$usuario->getEmail();?> </td>
            <td> 
                <a href="editar.php?id=<?=$usuario->getId();?>">[ Editar ]</a>
                <a 
                    href="excluir.php?id=<?=$usuario->getId();?>" 
                    onclick="return confirm('Tem certeza que deseja excluir?')">
                    [ Excluir ]
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>