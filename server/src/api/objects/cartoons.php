<?php

class Cartoons
{
    private $connect;
    private $table_name = "cartoons";

    public $id;
    public $name;
    public $description;

    public function __construct($db)
    {
        $this->connect = $db;
    }

    function read()
    {
        $query = "SELECT id, name, description FROM " . $this->table_name;

        $stmt = $this->connect->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, description=:description";

        $stmt = $this->connect->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function update()
    {
        $this->id = htmlspecialchars(strip_tags($this->id));
        $sql = "SELECT name, description FROM " . $this->table_name . " WHERE id = " . $this->id;
        if (empty($this->connect->query($sql)->fetch(PDO::FETCH_ASSOC))) {
            return false;
        }
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));


        if (!empty($this->name) && !empty($this->description)) {
            $query = "UPDATE " . $this->table_name . " SET name = :name, description = :description WHERE id = :id";
        } elseif (!empty($this->description)) {
            $query = "UPDATE " . $this->table_name . " SET name = name, description = :description WHERE id = :id";
        } else {
            $query = "UPDATE " . $this->table_name . " SET name = :name, description = description WHERE id = :id";
        }

        $stmt = $this->connect->prepare($query);
        if (!empty($this->name)) {
            $stmt->bindParam(":name", $this->name);
        }
        if (!empty($this->description)) {
            $stmt->bindParam(":description", $this->description);
        }
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function delete()
    {
        $sql = "SELECT id, name, description FROM " . $this->table_name . " WHERE id = ?";

        if ($sql == false)
            return false;
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->connect->prepare($query);

        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}