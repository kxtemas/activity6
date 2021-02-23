<?php
namespace App\Services\Business;

use App\Services\Data\SecurityDAO;

class SecurityService{
    
    public function __construct(){
        $this->securityDAO = new SecurityDAO();
    }

    public function getAllUsers(){
        return (new SecurityDAO())->getAllUsersDAO();
    }
   
    public function getUser(){
        return (new SecurityDAO())->getUserDAO();
    }

    public function updateUser($targetValue, $updatedValue){
        return (new SecurityDAO())->updateUserDAO($targetValue, $updatedValue);
    }
    public function deleteUser($id){
        return (new SecurityDAO())->deleteUserDAO($id);
    }

    public function suspendUser($id){
        return (new SecurityDAO())->suspendUserDAO($id);
    }

    public function reactivateUser($id){
        return (new SecurityDAO())->reactivateUserDAO($id);
    }
    public function getAllJobs(){
        return $this->securityDAO->getAllJobsDAO();
    }
    //Function to edit a job
    public function updateJob($id, $targetValue, $updatedValue){
        return $this->securityDAO->updateJobDAO($id, $targetValue, $updatedValue);
    }
    //Function to delete a job (no soft delete)
    public function deleteJob($id){
        return $this->securityDAO->deleteJobDAO($id);
    }
    //Function to create a job
    public function addJob($title, $description, $location, $type, $pay, $company, $employment, $phone, $email){
        return $this->securityDAO->addJobDAO($title, $description, $location, $type, $pay, $company, $employment, $phone, $email);
    }
    //Function to retrieve the job
    public function getJob($id){
        return $this->securityDAO->getJobDAO($id);
    }

}