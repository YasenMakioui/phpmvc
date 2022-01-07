<?php



class usuario {
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password = password_hash($this->db->escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function getRol() {
        return $this->rol;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setId($id): void {
        $this->id = $this->db->escape_string($id);
    }

    public function setNombre($nombre): void {
        $this->nombre = $this->db->escape_string($nombre);
    }

    public function setApellidos($apellidos): void {
        $this->apellidos = $this->db->escape_string($apellidos);
    }

    public function setEmail($email): void {
        $this->email = $this->db->escape_string($email);
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setRol($rol): void {
        $this->rol = $this->db->escape_string($rol);
    }

    public function setImagen($imagen): void {
        $this->imagen = $this->db->escape_string($imagen);
    }

    public function save() {
        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null);";
        $save = $this->db->query($sql);
        
        if($save) {
            return true;
        }
        
        return false;
    }
    
    public function login() {
        $email = $this->email;
        $password = $this->password;
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);
        
        if($login && $login->num_rows === 1) {
            
            $usuario = $login->fetch_object();
            
            $verify = password_verify($password, $usuario->password);
    
            if ($verify) {
                return $usuario;
            }
        }
        
        return false;
    }
    
}