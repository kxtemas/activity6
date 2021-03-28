<?php


namespace App\Http\Controllers;
use App\DTO;
use Illuminate\Http\Request;
use App\Services\Business\SecurityService;
use App\Services\Business\RestService;

class JobsRestController extends Controller
{
    private $rest;
    public function __construct(){
        $this->rest = new RestService();
    }
    public function index()
    {
        $jobs = $this->rest->getAllJobs();
        if($jobs){
            
            $dto = new DTO("200", "Users Found", $jobs);
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
        $job = $this->rest->findJobByID($id);
        if($job){
            
            $dto = new DTO("200", "Users Found", $job);
        }else{
            $dto = new DTO('404', 'No User Found', NULL);
        }
        return json_encode($dto);

    
       
    }
}

