<?php

namespace App\Http\Controllers;

use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use Throwable;
use App\Services\Data\AffinityGroupUserDAO;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //Create Job
    public function addGroup(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
     
        (new SecurityService())->addGroup($title, $description);
        
        return view('admin.dashboard');
    }
    
     //Update Job
    public function updateGroup(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $id = $request->input('id');
     
        
        $securityService = new SecurityService();
        $securityService->updateGroup($id, 'title', $title);
        $securityService->updateGroup($id, 'description', $description);
       
        echo("Successful Update");
        return view('admin.dashboard');
    }
    
    //Delete Job
     public function deleteGroup(Request $request){
    $id = $request->input('id');
    
    (new SecurityService())->deleteGroup($id);
    return view('admin.dashboard');
}
   
public function joinGroup(Request $request)
{
    $id = $request->input('id');
    try {
        (new SecurityService())->joinGroup($id);
        return redirect()->route('group.actions', $id);
    } catch (Throwable $e) {
        return redirect()->route('group.actions', $id);
    }
}

        //Leave group
//         public function leaveGroup(Request $request){
//             $id = $request->input('id');
//             (new AffinityGroupUserDAO())->DeleteRowByID($id);
//             echo("Successful Left Group");
//             return view('welcome');
//         }
        public function leaveGroup(Request $request)
        {
            $id = $request->input('id');
            try {
                (new SecurityService())->leaveGroup($id);
                return redirect()->route('group.actions', $id);
            } catch (Throwable $e) {
                return redirect()->route('group.actions', $id);
            }
        }
    }


