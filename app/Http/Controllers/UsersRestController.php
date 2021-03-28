<?php


namespace App\Http\Controllers;
use App\DTO;
use Illuminate\Http\Request;
use App\Services\Business\SecurityService;
use App\Services\Business\RestService;

class UsersRestController extends Controller
{
    private $rest;
    public function __construct(){
        $this->rest = new RestService();
    }
    public function index()
    {
        $users = $this->rest->getAllUsers();
        if($users){
            
            $dto = new DTO("200", "Users Found", $users);
        }else{
            $dto = new DTO('404', 'No User Found', NULL);
        }
         return json_encode($dto);

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->rest->findUserByID($id);
        if($user){
            
            $dto = new DTO("200", "User Found", $user);
        }else{
            $dto = new DTO('404', 'No User Found', NULL);
        }
        return json_encode($dto);
   
    
    }
    
       
    
}

