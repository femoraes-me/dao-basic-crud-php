<?php

require 'config.php'; //importação de arquivo de configuração

$lista = []; //array para usuarios

$sql = $pdo->query("SELECT * FROM usuarios"); //buscando usuarios

if($sql->rowCount() > 0) { //verificando se há usuarios no banco
    //armazenando os usuarios no array
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

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
            <td> <?=$usuario['id'];?> </td>
            <td> <?=$usuario['nome'];?> </td>
            <td> <?=$usuario['email'];?> </td>
            <td> 
                <a href="editar.php?id=<?=$usuario['id'];?>">[ Editar ]</a>
                <a 
                    href="excluir.php?id=<?=$usuario['id'];?>" 
                    onclick="return confirm('Tem certeza que deseja excluir?')">
                    [ Excluir ]
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>