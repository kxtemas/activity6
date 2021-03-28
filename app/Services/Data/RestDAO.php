<?php
namespace App\Services\Data;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class RestDAO {
    public function findAllUsers(){
        return DB::table('users')->get();
    }
    public function findUserByID($id){
        return DB::table('users')->where('id', $id)->first();
    }
    public function findAllJobs(){
        return DB::table('jobs')->get();
    }
    public function findJobByID($id){
        return DB::table('jobs')->where('id', $id)->first();
    }
}
?>
