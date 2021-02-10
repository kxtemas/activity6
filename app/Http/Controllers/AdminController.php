<?php

namespace App\Http\Controllers;

use App\User;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
      
    public function showUpdate(Request $request){
        $securityService = new SecurityService();
        $user = $securityService->getUser();
        $name = $request->input('name');
        $email = $request->input('email');
        
        $securityService->updateUser('name', $name);
        $securityService->updateUser('email', $email);

        return view('admin.update')
        ->with('user', $user);
    }
    
    public function showDelete(Request $request){
        $securityService = new SecurityService();
        $id = $request->input('id');
        $securityService->deleteUser($id); 
        echo ("Account deleted");
        return view('admin.dashboard');
       return view('admin.update');
       
    }
    
    public function showSuspend(Request $request){
        $securityService = new SecurityService();
        $id = $request->input('id');
        $securityService->suspendUser($id);
        echo ("The account selected has been suspend.");
        return view('admin.dashboard');
;
    }
    
    public function showReactivate(Request $request){
        $securityService = new SecurityService();
        $id = $request->input('id');
        $securityService->reactivateUser($id);
        echo ("Congrats, account has been reactivited!");
        return view('admin.dashboard');
      
        
    }
   

}