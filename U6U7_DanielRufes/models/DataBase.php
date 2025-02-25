<?php
class DataBase
{

    public function establishConnection()
    {
        $db = new mysqli("127.0.0.1", "rufes", "1234", "instituto_db");
        if ($db->connect_error) {
            return ("Connection failed: " . $db->connect_error);
        }
        return $db;
    }

    public function getAllStudents()
    {
        $db = $this->establishConnection();
        $sql = "SELECT * FROM alumnos";
        $result = $db->query($sql);
        return $result;
    }
    public function getAllSubjects()
    {
        $db = $this->establishConnection();
        $sql = "SELECT * FROM asignaturas";
        $result = $db->query($sql);
        return $result;
    }
    public function getAllMatriculas()
    {
        $db = $this->establishConnection();
        $sql = "SELECT * FROM matriculas";
        $result = $db->query($sql);
        return $result;
    }

    public function getStudentById($id)
    {
        $db = $this->establishConnection();
        $sql = "SELECT * FROM alumnos WHERE id = $id";
        $result = $db->query($sql);
        return $result;
    }

    public function insertMatricula($data){
        $info [] = $data["nia"];
        $info [] = $data["codigo"];
        $info [] = $data["año"];
        $db = $this->establishConnection();
        $sql = "INSERT INTO matriculas (nia, codigo, año) VALUES ($info[0], $info[1], $info[2])";
        return $db->query($sql);
    }

    public function deleteMatricula($id){
        $id = $id["id"];
        $db = $this->establishConnection();
        $sql = "DELETE FROM matriculas WHERE id = $id";
        return $db->query($sql);
    }

}
