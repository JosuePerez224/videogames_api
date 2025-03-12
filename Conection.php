<?php

class Conection{

    // These are the information of our db to be used in the conection
    private $hostname;
    private $username;
    private $database;
    private $password;

    public function __construct(){
        $this->hostname = "localhost";
        $this->username = "root";
        $this->database = "videogames_api";
        $this->password = "";
    }
    // This function is used to be used in any part of the web app and get the conection in a easy way
    function getConnection()
    {
        try {
            // Intenta la conexión a la base de datos
            $conn = new PDO("mysql:host=$this->hostname;dbname=$this->database", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conectado exitosamente a la base de datos<br>"; // Mensaje de depuración
            return $conn;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage()); // Muestra el error en pantalla
        }
    }

}
