<?php
namespace App\Services\Data;

use App\User;
use Illuminate\Support\Facades\Auth;

class SecurityDAO{

    public function getAllUsersDAO(){
        return User::withTrashed()->get();
    }

    public function updateUserDAO($targetValue, $updatedValue){
        $user = $this->getUserDAO();
        $user->$targetValue = $updatedValue;
        return $user->save();
    }

    public function getUserDAO(){
        return Auth::User();
    }

    public function deleteUserDAO($id){
        $user = $this->getUserByIDDAO($id);
        return $user->forceDelete();
    }

    public function suspendUserDAO($id){
        $user = $this->getUserByIDDAO($id);
        return $user->delete();
    }

    public function getUserByIDDAO($id){
        return User::withTrashed()->findOrFail($id);
    }

    public function reactivateUserDAO($id){
        $user = $this->getUserByIDDAO($id);
        return $user->restore();
    }

}