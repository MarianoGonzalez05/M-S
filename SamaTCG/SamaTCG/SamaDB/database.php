<?php
class Database {
    private $hostname = "localhost";
    private $database = "samabd";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";

    public function conectar() {
        $conexion = "mysql:host=" . $this->hostname . ";dbname=" . $this->database . ";charset=" . $this->charset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $pdo = new PDO($conexion, $this->username, $this->password, $options);
            return $pdo; // Retorna la conexión PDO
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit; 
        }
    }
}