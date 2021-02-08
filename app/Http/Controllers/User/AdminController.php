<?php

namespace App\Http\Controllers;

use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showUpdate(Request $request){
        $securityService = new SecurityService();
        $user = $securityService->getUser();
        $name = $request->input('name');
        $email = $request->input('email');
        
        $securityService->updateUser('name', $name);
        $securityService->updateUser('email', $email);

        
        return view('profile')
        ->with('user', $user);
    }
    
    public function showDelete(Request $request){
        $securityService = new SecurityService();
        $id = $request->input('id');
        $securityService->deleteUser($id);
        $listOfUsers = $securityService->getAllUsers();
        return view('administration')
        ->with('list', $listOfUsers);
    }
    
    public function showSuspend(Request $request){
        $securityService = new SecurityService();
        $id = $request->input('id');
        $securityService->suspendUser($id);
        $listOfUsers = $securityService->getAllUsers();
        return view('administration')
        ->with('list', $listOfUsers);
    }
    
    public function showReactivate(Request $request){
        $securityService = new SecurityService();
        $id = $request->input('id');
        $securityService->reactivateUser($id);
        $listOfUsers = $securityService->getAllUsers();
        return view('administration')
        ->with('list', $listOfUsers);
    }
}