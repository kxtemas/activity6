<?php
namespace App\Services\Business;

use App\Services\Data\RestDAO;

class RestService{

    private $restDAO;

    public function __construct(){
        $this->restDAO = new RestDAO();
    }

    public function getAllUsers(){
        return $this->restDAO->findAllUsers();
    }
    public function findUserByID($id){
        return $this->restDAO->findUserByID($id);
    }
    public function getAllJobs(){
        return $this->restDAO->findAllJobs();
    }
    public function findJobByID($id){
        return $this->restDAO->findJobByID($id);
    }
    
}
?>
