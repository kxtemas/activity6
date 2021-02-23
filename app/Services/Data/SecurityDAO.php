<?php
namespace App\Services\Data;

use App\User;
use App\Job;
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
    public function getAllJobsDAO()
    {
        return Job::all();
    }
    public function updateJobDAO($id, $targetValue, $updatedValue)
    {
        $job = $this->getJobDAO($id);
        $job->$targetValue = $updatedValue;
        return $job->save();
    }
    public function deleteJobDAO($id)
    {
        $job = $this->getJobDAO($id);
        return $job->delete();
    }
    public function addJobDAO($title, $description, $location, $type, $pay, $company, $employment, $phone, $email)
    {
        $job = new Job();
        $job->title = $title;
        $job->description = $description;
        $job->location = $location;
        $job->pay_range = $pay;
        $job->type = $type;
        $job->company = $company;
        $job->employment = $employment;
        $job->phonenumber = $phone;
        $job->email = $email;
        return $job->save();
    }
    public function getJobDAO($id)
    {
        return Job::findOrFail($id);
    }

}