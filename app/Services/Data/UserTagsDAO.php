<?php
namespace App\Services\Data;

use Illuminate\Support\Facades\DB;
use App\Models\UserTagsModel;

class UserTagsDAO
{
    public function __construct()
    {}
    
    /**
     * Checks to see if the UserTag exists by its ID number
     * @param int $id
     * @return boolean
     */
    public function DoesUserTagExistByID(int $id)
    {
        return DB::table('usertags')->where('ID', $id)->exists();
    }
    
    /**
     * Checks to see if the UserTag exists by its UserID number
     * @param int $userID
     * @return boolean
     */
    public function DoesUserTagExistByUserID(int $userID)
    {
        return DB::table('usertags')->where('UserID', $userID)->exists();
    }
    
    /**
     * Checks to see if the UserTag exists by its TagID
     * @param int $tagID
     * @return boolean
     */
    public function DoesUserTagExistByTagID(int $tagID)
    {
        return DB::table('usertags')->where('TagID', $tagID)->exists();
    }
    
    /**
     * Checks to see if the user has the tag
     * @param int $userID : The user to search for
     * @param int $tagID : The tag to search for
     * @return boolean
     */
    public function DoesUserHaveUserTag(int $userID, int $tagID)
    {
        // Check to see if the user doesn't have any tags
        if(!$this->DoesUserTagExistByUserID($userID)) return FALSE;
        
        // Checks the table to see if the UserID and TagID matches any table entry
        return DB::table('usertags')->where('UserID', $userID)->where('TagID', $tagID)->exists();
    }

    
    public function AddNewUserTag(UserTagsModel $model)
    {
        // Check to see if the user already has the tag
        if($this->DoesUserHaveUserTag($model->getUserID(), $model->getTagID())) return TRUE;

        // 
        $values = 
        [
            'UserID' => $model->getUserID(),
            'TagID' => $model->getTagID()
        ];
        
        // Insert the tag into the table
        return DB::table('usertags')->insert($values);
        
    }
    
    
    public function DeleteUserTag(UserTagsModel $model)
    {
        // Check to see if the user doesn't has the tag
        if(!$this->DoesUserHaveUserTag($model->getUserID(), $model->getTagID())) return TRUE;
        
        // Delete the UserTag from the table
        $result = DB::table('usertags')
            ->where('UserID', $model->getUserID())
            ->where('TagID', $model->getTagID())
            ->delete();
        
        if($result > 0) return TRUE;
        else return FALSE;
    }
    
}

