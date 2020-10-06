<?php
require 'config.php';

$id = filter_input(INPUT_GET, 'id');

$info = []; //array para armazenar as informações do usuario

if($id) {

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
        //armazenando informação do usuario no array
        $info = $sql->fetch( PDO::FETCH_ASSOC ); 
    } else {
        //retornando para index se id não encontrado
        header("Location: index.php"); exit;
    }

} else {
    header("Location: index.php");
    exit;
}
?>


<h1>Editar Usuário</h1>

<form method="POST" action="editar_action.php">

    <input type="hidden" name="id" value="<?=$info['id']?>">

    <label>
        Nome: <br>
        <input type="text" name="name" value="<?=$info['nome']?>">
        <br><br>
    </label>
    <label>
        Email: <br>
        <input type="email" name="email" value="<?=$info['email']?>">
        <br><br>
    </label>

    <input type="submit" value="Salvar">
</form>