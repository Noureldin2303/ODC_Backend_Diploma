<?php



class db{
    public $connection,$sql,$query;

    protected $serverName;
    protected $userName;
    protected $passCode;
    protected $dbName;

    public function __construct()
    {
        $this -> serverName = "localhost";
        $this -> userName = "root";
        $this -> passCode = "";
        $this -> dbName = "odc";
        $this->connection = mysqli_connect($this->serverName,$this->userName,$this->passCode,$this->dbName);
    }

    public function select($table,$column){
        $this->sql = "SELECT `$column` FROM `$table`";
        return $this;
    }

    public function where($column,$compare,$value){
        $this->sql .= " WHERE `$column` $compare '$value'";
        return $this;
    }

    public function and($column,$compare,$value){
        $this->sql .= " AND `$column` $compare '$value'";
        return $this;
    }

    public function or($column,$compare,$value){
        $this->sql .= " OR `$column` $compare '$value'";
        return $this;
    }

    public function getAll(){
        $this->query = mysqli_query($this->connection,$this->sql);
        $rows = [];
        while($row = mysqli_fetch_assoc($this->query)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getRow(){
        $this->query = mysqli_query($this->connection,$this->sql);
        $row = mysqli_fetch_assoc($this->query);
       
        return $row;
    }

    public function insert($table,$rows){

        $columns = "";
        $values = "";
        foreach($rows as $key => $value){
            $columns .= " `$key` ,";
            $values .= " '$value' ,";
        }

        $columns = rtrim($columns,",");
        $values = rtrim($values,",");

        $this->sql = "INSERT INTO `user` ($columns) VALUES ($values)";
        return $this;
    }


    public function update($table,$rows){

        $p = "";
        foreach($rows as $key => $value){
            $p .= " `$key` = '$value' ,";
        }
        $p = rtrim($p,",");

        $this->sql = "UPDATE `$table` SET $p";
        return $this;
    }

    public function delete($table,$rows){
        $this->sql = "DELETE FROM `$table`";
        return $this;
    }

    public function exec(){
        $this->query = mysqli_query($this->connection,$this->sql);
        if(mysqli_affected_rows($this->connection) > 0){
            return true;
        }else{
            return false;
        }
    }
}