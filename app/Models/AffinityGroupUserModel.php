<?php
namespace App\Models;

class AffinityGroupUserModel
{

    private $id;
    
    private $userID;
    
    private $groupID;
    
    public function __construct(int $id, int $userID, int $groupID)
    {
        $this->id = $id;
        $this->userID = $userID;
        $this->groupID = $groupID;
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
    public function getGroupID()
    {
        return $this->groupID;
    }
}

