<?php

require_once 'database.php';

class Accounts{
    //attributes

    public $id;
    public $username;
    public $password;
    public $type;
    public $firstname;
    public $lastname;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function validate(){
        $sql = "SELECT * FROM user WHERE username=:username and password=:password ;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }


}

?>