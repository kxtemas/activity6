<?php
namespace App\Http\Controllers; 
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\Data\AffinityGroupDAO;
use App\Services\Data\AffinityGroupUserDAO;
use App\Services\Data\SecurityDAO;
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
        
        return view('groupsinfo',['groups'=>$group])->with('list', $listOfGroups);
    }
public function showGroupAdmin(){
        $group = DB::select('select * from groups');
        $listOfGroups = (new SecurityService())->getAllGroups();
        return view('admin.groupadmin',['groups'=>$group])->with('list', $listOfGroups);
    }
 
    //Group Page
    public function showGroupActions($id){
     //   $secService = new SecurityService();
       $group = (new SecurityService())->getGroupByID($id);
      // $listOfGroups = (new SecurityService())->getAllGroups();
       $listofmembersIDS =(new AffinityGroupUserDAO())->GetRowIDsByGroupID($id);
       //$membernames = (new AffinityGroupUserDAO())->GetNameByID($listofmembersIDS);
      // $members = DB::select('select * from users');
      // $results = DB::table('users')->where('id', $listofmembersIDS)->get('name');    
        return view('viewgroups')
        ->with('group', $group)->with('members',$listofmembersIDS)->with('userid',$listofmembersIDS);
        
    }
    public function showJobActions($id){
        //   $secService = new SecurityService();
        $job = (new SecurityService())->getJobByID($id);
        $applicants =(new SecurityDAO())->GetRowIDsByGroupID($id);
        return view('applyjobs')
        ->with('job', $job)->with('userid', $applicants);
        
    }
   
    

}
