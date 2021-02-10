<?php
namespace App\Services\Business;

use App\Services\Data\SecurityDAO;

class SecurityService{

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

}