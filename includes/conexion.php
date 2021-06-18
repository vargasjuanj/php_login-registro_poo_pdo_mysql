<?php



class Conexion
{
    private $host = 'localhost';
    private $dbName = 'php_registro_loguin';
    private $usuario = 'root';
    private $password = '';


    public function conectar()
    {

        try {

            $conexion = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->usuario, $this->password);
         
        } catch (PDOException $e) {

            die('Error al conect ar bd! ' . $e->getMessage());
        }


        return $conexion;
    }
}

$conexion = new Conexion();

//$conexion->conectar(); //Conecta automaticamente pero lo vamos requiriendo a medida q hacemos 

