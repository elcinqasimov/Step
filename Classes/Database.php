<?php

///////////////////////////////////////
//                                   //
// Kriminalistik Tədqiqatlar İdarəsi //
//        mühəndis-proqramçı         //
//          Elçin Qasımov            //
//                                   //
///////////////////////////////////////

///////////////////////////////////////
//        DEFINE Security            //
///////////////////////////////////////
// defined('SECURITY') or die('Error');
///////////////////////////////////////

class Database
{

    public $hostname, $dbname, $username, $password, $conn;

    function __construct($database_name, $username, $password, $host = 'localhost')
    {
        try {
        $this->conn = new PDO("mysql:host=$host;dbname=$database_name", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    
    function query($sql) {
        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute();
            $rows = $stmt->fetchAll(); // assuming $result == true
            return $rows;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function select($tbl, $cond='') {
        $sql = "SELECT * FROM $tbl";
        if ($cond!='') {
            $sql .= " WHERE $cond ";
        }
        try {
             $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute();
            $rows = $stmt->fetchAll(); // assuming $result == true
            return $rows;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    function num_rows($rows){
        $n = count($rows);
        return $n;
    }


    /* Insert/update functions */
    function insert($table,$data = array())
    {
        $col = array_keys($data);
        $columns = implode(', ', $col);  
        $toImplode=array();
        foreach($col as $colss) {
            $toImplode[]= ":$colss";
            }
        $wcolumn = implode(',', $toImplode);
        $sql = "insert into $table ($columns) values ($wcolumn)";
        $smtp = $this->conn->prepare($sql);
        foreach($data as $key=>$value)
        {
            $smtp ->bindParam(':'.$key.'', $$key);
               $$key = ''.$value.'';
        }
        $smtp->execute();
    }


    function update($tbl, $arr, $cond) {
        $sql = "UPDATE `$tbl` SET ";
        $fld = array();
        foreach ($arr as $k => $v) {
            $fld[] = "`$k` = '$v'";
        }
        $sql .= implode(", ", $fld);
        $sql .= " WHERE " . $cond;
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->rowCount(); // 1
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    
    function delete($tbl, $cond='') {
        $sql = "DELETE FROM `$tbl`";
        if ($cond!='') {
            $sql .= " WHERE $cond ";
        }
    
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->rowCount(); // 1
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }


    public function id()
    {
        $stmt = $this->conn->prepare("select LAST_INSERT_ID()");
        $stmt->execute();
        $rows = $stmt->fetchAll(); // assuming $result == true
        return $rows[0]["LAST_INSERT_ID()"];
    }

    public function close(){
        $this->$conn->close();
    }

}
