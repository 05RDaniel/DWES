<?php
class DataBase
{
    private $connection;

    public function establishConnection($host, $user, $key, $db)
    {
        $this->connection = new mysqli($host, $user, $key, $db);
        if ($this->connection->connect_errno) return -1;
        else return 0;
    }

    public function closeConnection() {
        if ($this->connection) $this->connection->close();
      }

      public function dataQuery($sql) {
        $res = $this->connection->query($sql);
        $resArray = array();
        if ($res) {
          $resArray = $res->fetch_all(MYSQLI_ASSOC);
        }
        return $resArray;
      }
}