<?php
namespace App\Services\Data;

 use Illuminate\Support\Facades\DB;
use App\Group;
use App\Models\AffinityGroupModel;

 class AffinityGroupDAO
{

     private $table = "";

     public function __construct()
    {
        $this->table = "groups";
    }

     /**
     * Checks to see if the group exists in the 
     *  database by its id number
     * @param int $id
     * @return boolean
     */
    public function DoesGroupExistByID(int $id)
    {
        return DB::table($this->table)->where('ID', $id)->exists();
    }

     /**
     * Gets the group model from the table
     * @param int $id : The model's id number
     * @return boolean|AffinityGroupModel
     *  : FALSE-group doesn't exist | AffinityGroupModel-The requested model
     */
    public function GetGroupByID(int $id)
    {
        // Check to see if the group doesn't exists
        if(!$this->DoesGroupExistByID($id)) return FALSE;

         // Get the row data from the database
        $row = DB::table($this->table)->where('ID', $id)->first();

         // Asign values to varables from the database data
        $ID = $row->ID;
        $groupName = $row->GroupName;
        $groupDescription = $row->GroupDescription;

         // Create and return the model
        return new AffinityGroupModel($ID, $groupName, $groupDescription);
    }

     /**
     * Inserts the new group into the table
     * @param AffinityGroupModel $model
     * @return boolean
     */
    public function AddNewGroup(AffinityGroupModel $model)
    {
        // Convert $model to array
        $valuesArray =
        [
            'GroupName' => $model->getGroupName(),
            'GroupDescription' => $model->getGroupDescription()
        ];

         // Insert the tag into the table
        return DB::table($this->table)->insert($valuesArray);
    }

     /**
     * Updates the group with its new data
     * @param AffinityGroupModel $model
     * @return boolean
     */
    public function UpdateGroup(AffinityGroupModel $model)
    {
        // Check to see if the group doesn't exist
        if(!$this->DoesGroupExistByID($model->getID())) return FALSE;

         // Check to see if the group properties haven't changed
        if($this->GetGroupByID($model->getID())->Equals($model)) return TRUE;

         // Check to see if the group name was taken by another group
        $nameCheck = $this->GetGroupIDByName($model->getGroupName());
        if($nameCheck != FALSE)
        {
            // Check to see if the id numbers don't match
            if($nameCheck != $model->getID()) return FALSE;
        }


         // Convert $model to array
        $valuesArray =
        [
            'GroupName' => $model->getGroupName(),
            'GroupDescription' => $model->getGroupDescription()
        ];

         // Insert the model into the table
        $result = DB::table($this->table)->where('ID', $model->getId())->update($valuesArray);

         // Was more then one row updated
        if($result > 1)
        {
            // Send message to admins about the issue
            // {code}

             // Check to see if the row was updated correctly
            if($this->GetGroupByID($model->getId())->Equals($model)) return TRUE;
            else return FALSE;
        }
        // If there was no rows effected
        else if($result < 1) return FALSE;
        // If there was only one row effected
        else if($result == 1) return TRUE;
        // If any other result happed
        else
        {
            // Send message to admins about the issue
            // {code}

             return FALSE;
        }
    }

     /**
     * Gets the group id by the group's name
     * @param string $name
     * @return boolean|number 
     *  : FALSE-No group was found | number-The id number of the group
     */
    public function GetGroupIDByName(string $name)
    {
        // Get the row data from the table
        $row = DB::table($this->table)->where('GroupName', $name)->first();

         // Check to see if there no results
        if($row == null) return FALSE;

         // Return the ID number of the found group
        return (int)$row->ID;
    }
    public function getAllGroupsDAO(){
        return Group::all();
    }

 }

