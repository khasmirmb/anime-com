<?php

require_once 'database.php';

class Choices{
    //attributes

    public $id;
    public $anime_name;
    public $description;
    public $poll;
    public $image;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }


    function add(){
        $sql = "INSERT INTO polls_choices (anime_name, description, poll, image) VALUES
        (:anime_name, :description, :poll, :image);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':anime_name', $this->anime_name);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':poll', $this->poll);
        $query->bindParam(':image', $this->image);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function edit(){
        $sql = "UPDATE polls_choices SET anime_name=:anime_name, description=:description, poll=:poll, image=:image WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':anime_name', $this->anime_name);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':poll', $this->poll);
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
        $sql = "SELECT polls_choices.id, polls_choices.anime_name, polls_choices.description, polls_choices.image, polls.title AS poll_name FROM polls_choices INNER JOIN polls ON polls_choices.poll = polls.id ORDER BY poll_name DESC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM polls_choices WHERE id = :id;";
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
        $sql = "SELECT * FROM polls_choices WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

}

?>