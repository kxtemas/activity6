<?php
namespace App\Http\Controllers; 
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
}
