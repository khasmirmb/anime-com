<?php

require_once 'database.php';

class Answers{
    //attributes

    public $id;
    public $user;
    public $poll;
    public $choice;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }


    function show(){
        $sql = "SELECT polls_answers.id, polls_answers.user, polls_answers.poll ,polls_answers.choice,CONCAT(user.firstname,', ',user.lastname) AS fullname,
        polls.title AS poll_title,
        polls_choices.anime_name AS poll_anime_name,
        polls_choices.image AS poll_image
        FROM polls_answers INNER JOIN user ON polls_answers.user = user.id INNER JOIN polls ON polls_answers.poll = polls.id INNER JOIN polls_choices ON polls_answers.choice = polls_choices.id ORDER BY poll_title DESC";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM polls_answers WHERE id = :id;";
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
        $sql = "SELECT * FROM polls_answers WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

}

?>