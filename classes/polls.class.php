<?php

require_once 'database.php';

class Polls{
    //attributes

    public $id;
    public $title;
    public $season;
    public $image;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }


    function add(){
        $sql = "INSERT INTO polls (title, season, image) VALUES
        (:title, :season, :image);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':title', $this->title);
        $query->bindParam(':season', $this->season);
        $query->bindParam(':image', $this->image);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function edit(){
        $sql = "UPDATE polls SET title=:title, season=:season, image=:image WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':title', $this->title);
        $query->bindParam(':season', $this->season);
        $query->bindParam(':image', $this->image);
        $query->bindParam(':id', $this->id);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function show(){
        $sql = "SELECT * FROM polls;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM polls WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function fetch($record_id){
        $sql = "SELECT * FROM polls WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

}

?>