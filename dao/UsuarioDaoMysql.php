<?php
require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO {
    private $pdo;

    public function __contructor(PDO $driver) {
        $this->pdo = $driver;
    }
    
    public function add(Usuario $u) {

    }

    public function findAll() {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM usuarios");

        return $array;
    }

    public function findById($id) {

    }

    public function update(Usuario $u) {

    }

    public function delete($id) {

    }
}