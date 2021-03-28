<?php
namespace App\Services\Data\Utility;

use mysqli;

class DBConnect {

    private $conn;
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $query;

    public function __construct(string $dbname){

        $this->dbname = $dbname;
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "root";

    }

    public function getDbConnect(){
        $this->conn = mysqli_connect(
            $this->servername,
            $this->username,
            $this->password,
            $this->dbname
        );
    }

    public function setDbAutoCommitTrue(){
        $this->conn->autocommit(TRUE);
    }
    public function setDbAutoCommitFalse(){
        $this->conn->autocommit(FALSE);
    }
    public function closeDbConnect(){
        $this->conn->close();
    }
    public function beginTransaction(){
        $this->conn->begin_transaction();
    }
    public function commitTransaction(){
        $this->conn->commit();
    }
    public function rollbackTransaction(){
        $this->conn->rollback();
    }
    public function getConn(){
        return $this->conn;
    }

}
?>
