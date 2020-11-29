<?php


namespace Models;

use mysqli;

class Film extends AbstractModel
{
    protected $db;

    public function all()
    {
        $query = "select * from films";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function add($name, $year, $description)
    {
        $query = "INSERT INTO films (id, name, year, description) VALUES (NULL, '{$name}', '{$year}', '{$description}');";
        $this->db->query($query);
        if($this->db->query($query)){
            $_SESSION['message'] = "Film was added";
        }else{
            $_SESSION['message'] = "Film wasn`t added";
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM films WHERE id = $id";
        $this->db->query($query);
        if($this->db->query($query)){
            $_SESSION['message'] = "Film was deleted";
        }
    }

    public function getFilm($id)
    {
        $query = "SELECT * FROM films WHERE id = $id;";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function update($id, $name, $year, $description)
    {
        $name = addslashes($name);
        $description = addslashes($description);
        $query = "UPDATE films SET name = '$name', year = '$year', description = '$description' WHERE id = $id;";
        $this->db->query($query);
        if($this->db->query($query)){
            $_SESSION['message'] = "Film was updated";
        }
    }
}