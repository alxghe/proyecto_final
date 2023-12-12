<?php
class Connection{
    private $server = "mysql:host=localhost;dbname=psicolab";
    private $usename = "root";
    private $password = "2016yono";
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
    public function obtenerIdUsuario($nombre_usuario) {
        $stmt = $this->conn->prepare("SELECT id FROM Usuarios WHERE nombre = :nombre");
        $stmt->bindParam(':nombre', $nombre_usuario);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($result !== false) ? $result['id'] : null;
    }
}
