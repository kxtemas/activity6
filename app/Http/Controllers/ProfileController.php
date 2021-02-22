<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfileModel;
use App\Services\UserDatabaseService;
use App\Services\ProfileDatabaseServices;
use App\Services\Business\TagTranslatorService;
use App\Services\Data\TagsDAO;
use App\Services\Data\UserTagsDAO;
use App\Models\UserTagsModel;

class ProfileController extends Controller
{
   
    public function update(Request $request)
    {
        // Get services
        $udbs = new UserDatabaseService();
        $updbs = new ProfileDatabaseServices();
        
        // Check to see if the method is POST
        if($request->isMethod('POST'))
        {
            // Get data from http request
            $userID = $request->input('userID');
            $phoneNumber = $request->input('phoneNumber');
            $streetAddress = $request->input('streetAddress');
            $city = $request->input('city');
            $state = $request->input('state');
            $zipCode = $request->input('zipCode');
            $employmentStatus = $request->input('employmentStatus');
            $occupation = $request->input('occupation');
            $companyName = $request->input('companyName');
            $educationalBackground = $request->input('educationalBackground');
            $skillsList = $request->input('skills');
            $jobHistory = $request->input('jobHistory');
            
            // Check to see if the userID is valid user in the database
            if($udbs->DoesUserExistByID($userID))
            {
                // Create the UserProfileModel object using resevied data
                $userProfile = new UserProfileModel($userID, $phoneNumber, 
                                                    $streetAddress, $city, $state, 
                                                    $zipCode, $employmentStatus, $occupation, 
                                                    $companyName, $educationalBackground,
                                                    $skillsList, $jobHistory);
                
                // Update the database with profile
                $result = $updbs->UpdateUserProfile($userProfile);
                
                // Check to see if the profile was updated
                if($result)
                {
                    // Look through the skilsList for tags
                    $tagTranslate = new TagTranslatorService();
                    $tagDAO = new TagsDAO();
                    $tags = array();
                    $tags = $tagTranslate->GetTagsFromString($userProfile->getSkillsList());
                    $tagIDs = array();
                    
                    // Add found tags to the tag table
                    foreach($tags as $tag)
                    {
                        $tagDAO->AddNewTag($tag);
                        array_push($tagIDs, $tagDAO->GetTagIDByName($tag->getName()));
                    }
                    
                    // Add the tags to the usertags table
                    $userTagDAO = new UserTagsDAO();
                    $i = 0;
                    foreach($tags as $tag)
                    {
                        $userTagDAO->AddNewUserTag(new UserTagsModel(0, auth()->id(), $tagIDs[$i]));
                        $i++;
                    }
                    
                    return view('profile');
                }
                else
                {
                    return back();
                }
            }// End of if($udbs->DoesUserExistByID($userID))
            else return back();
        }// End of if($request->isMethod('POST'))
        else return back();
    } // End of function
}