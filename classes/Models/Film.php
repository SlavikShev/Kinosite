<?php


namespace Models;

use mysqli;

class Film
{
    protected $db;

    public function __construct()
    {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function all()
    {
        $query = "select * from films";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function add($name, $year, $description) {
        $query = "INSERT INTO films (id, name, year, description) VALUES (NULL, '{$name}', '{$year}', '{$description}');";
        $this->db->query($query);
    }

    public function delete($id){
        $query = "DELETE FROM films WHERE id = $id";
        $this->db->query($query);
    }

    public function getFilm($id)
    {
        $query = "SELECT * FROM films WHERE id = $id;";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function update($id, $name, $year, $description)
    {
        $query = "UPDATE films SET name = '$name', year = '$year', description = '$description' WHERE id = $id;";
        $this->db->query($query);
    }
}