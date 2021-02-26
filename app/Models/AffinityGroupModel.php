<?php
namespace App\Models;

class AffinityGroupModel
{

    private $id;
    
    private $groupName;
    
    private $groupDescription;
    
    public function __construct(int $id, string $groupName, string $groupDescription)
    {
        $this->id = $id;
        $this->groupName = $groupName;
        $this->groupDescription = $groupDescription;
    }
    
    /**
     * @return int
     */
    public function getID()
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getGroupName()
    {
        return $this->groupName;
    }
    
    /**
     * @return string
     */
    public function getGroupDescription()
    {
        return $this->groupDescription;
    }
    
    /**
     * Checks to see if the models are the same
     * @param AffinityGroupModel $model
     * @return boolean
     */
    public function Equals(AffinityGroupModel $model)
    {
        // If the ID's don't match
        if($this->id != $model->getID()) return FALSE;
        
        // If the group names don't match
        if($this->groupName != $model->groupName) return FALSE;
        
        // If the group descriptions don't match
        if($this->groupDescription != $model->groupDescription) return FALSE;
        
        // If all previous values match
        return TRUE;
    }
    
}

