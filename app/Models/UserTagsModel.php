<?php
namespace App\Models;

class UserTagsModel
{
    
    private $id;
    private $userID;
    private $tagID;
    
    public function __construct(int $id, int $userID, int $tagID)
    {
        $this->id = $id;
        $this->userID = $userID;
        $this->tagID = $tagID;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }
    
    /**
     * @return int
     */
    public function getTagID()
    {
        return $this->tagID;
    }
    
    
    /**
     * Compares the two models
     * @param UserTagsModel $model
     * @return boolean
     */
    public function Equals(UserTagsModel $model)
    {
        // Are the ID's not matching
        if($this->id != $model->getId()) return FALSE;
        
        // Are the UserID's not matching
        if($this->userID != $model->getUserID()) return FALSE;
        
        // Are the TagID's not matching
        if($this->tagID != $model->getTagID()) return FALSE;
        
        // Models are the same
        return TRUE;
        
    }
}


