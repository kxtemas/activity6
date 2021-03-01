<?php
namespace App\Http\Controllers; 
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\Data\AffinityGroupDAO;
use App\Services\Data\AffinityGroupUserDAO;
class NavigationController extends Controller {
    public function index(){
        $users = DB::select('select * from users');

        return view('admin.register-edit',['users'=>$users]);
    }
  public function showJobAdmin(){
        $job = DB::select('select * from jobs');
        $listOfJobs = (new SecurityService())->getAllJobs();
        return view('admin.jobadmin',['jobs'=>$job])->with('list', $listOfJobs);
    }

    public function showAdmin(){
        $listOfUsers = (new SecurityService())->getAllUsers();
        return view('admin.register-edit')
            ->with('list', $listOfUsers);
    }
    
    public function showJobs(){
        $job = DB::select('select * from jobs');
        $listOfJobs = (new SecurityService())->getAllJobs();
        return view('viewsjobs',['jobs'=>$job])->with('list', $listOfJobs);
    }
    

    public function showUpdate(){
        $user = (new SecurityService())->getUser();
        return view('admin.register-edit')
            ->with('user', $user);
    }


   public function showJobUpdate(Request $request)
    {
        $id = $request->input('id');
        $job = (new SecurityService())->getJob($id);
        return view('admin.jobedit')
            ->with('job', $job);
    }
 
   public function showGroupUpdate(Request $request)
    {
        $id = $request->input('id');
        $group = (new SecurityService())->getGroup($id);
        return view('admin.groupedit')
            ->with('group', $group);
    }
 public function showGroups(){
        $group = DB::select('select * from groups');
        $listOfGroups = (new SecurityService())->getAllGroups();
        
        return view('viewsgroups',['groups'=>$group])->with('list', $listOfGroups);
    }
public function showGroupAdmin(){
        $group = DB::select('select * from groups');
        $listOfGroups = (new SecurityService())->getAllGroups();
        return view('admin.groupadmin',['groups'=>$group])->with('list', $listOfGroups);
    }
 
    //Group Page
    public function showGroupActions($id){
       // $secService = new SecurityService();
        //$members = DB::select('select * from members');
        $group = (new SecurityService())->getGroupByID($id);
       $listOfGroups = (new SecurityService())->getAllGroups();
       $listofmembersIDS =(new AffinityGroupUserDAO())->GetRowIDsByGroupID($id);
    //    $listOfMembers = (new SecurityService())->getMembers($listofmembersIDS);
        //= (new AffinityGroupUserDAO())->GetRowIDsByGroupID($id);
        
      //  $listofmembers =(new AffinityGroupUserDAO())->GetRowIDsByGroupID($id);
        //$member = (new AffinityGroupUserDAO())->GetRowModelByID($id);
        
//         $listOfMemberModels = array();
        
//         // loop through all of the retrived userIDs
//         foreach ($listOfMemberIds as $memberID)
//         {
//             array_push($listOfMemberModels, $secService->getUserByID($memberID));
//         }
        
        
        
        return view('viewgroups')
        ->with('group', $group)->with('list', $listOfGroups)->with('members',$listofmembersIDS);
        
    }
   
    

}
