<?php
class Connection{
    private $server = "mysql:host=localhost;dbname=psicolab";
    private $usename = "root";
    private $password = "aqui pongan la contraseña que ustedes tengan";
    private $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC);
    protected $conn;
    public function open(){
        try {
            $this->conn = new PDO($this->server, $this->usename,$this->password,$this->options); 
            return $this->conn;
        }catch(PDOException $e){
            echo "actualmente existe un error en la base de datos" . $e -> getMessage();
        }
    }
    public function close(){
        $this->conn = null;
    }
}
