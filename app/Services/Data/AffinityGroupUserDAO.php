<?php
namespace App\Services\Data;

 use Illuminate\Support\Facades\DB;
use App\Models\AffinityGroupUserModel;

 class AffinityGroupUserDAO
{

     private $table = "";

     public function __construct()
    {
        $this->table = "members";
    }



     // [Exists Methods] [Exists Methods] [Exists Methods] [Exists Methods] [Exists Methods] [Exists Methods] [Exists Methods] [Exists Methods] [Exists Methods] [Exists Methods] [Exists Methods]

     /**
     * Checks to see if the row exists in the database by its id
     * @param int $id
     * @return boolean
     */
    public function DoesRowExists(int $id)
    {
        return DB::table($this->table)->where('ID', $id)->exists();
    }

     /**
     * Checks to see if the requested group has any users
     * @param int $groupID
     * @return boolean
     */
    public function DoesGroupHaveUsers(int $groupID)
    {
        return DB::table($this->table)->where('GroupID', $groupID)->exists();
    }

     /**
     * Checks to see if the user is in a group
     * @param int $userID
     * @return boolean
     */
    public function IsUserInAGroup(int $userID)
    {
        return DB::table($this->table)->where('UserID', $userID)->exists();
    }

     /**
     * Checks to see if the user is in the requested group
     * @param int $userID : The user
     * @param int $groupID : The group to search in
     * @return boolean
     */
    public function IsUserInGroup(int $userID, int $groupID)
    {
        // Check to see if the user is in any groups
        if(!$this->IsUserInAGroup($userID)) return FALSE;

         // Check to see if the requested group has no members
        if(!$this->DoesGroupHaveUsers($groupID)) return FALSE;

         // Checks the table to see if the UserID and GroupID 
        // matches in the table
        return DB::table($this->table)->where('UserID', $userID)->where('GroupID', $groupID)->exists();
    }



     // [Get Single Model] [Get Single Model] [Get Single Model] [Get Single Model] [Get Single Model] [Get Single Model] [Get Single Model] [Get Single Model] [Get Single Model] [Get Single Model]

     /**
     * Gets the model from the table
     * @param int $id : the model's id number
     * @return boolean|AffinityGroupUserModel
     *  : FALSE - row doesn't exist | AffinityGroupUserModel-The requested model
     */
    public function GetRowModelByID(int $id)
    {
        // Check to see if the row doesn't exists
        if(!$this->DoesRowExists($id)) return FALSE;

         // Get the row data from the database
        $row = DB::table($this->table)->where('ID', $id)->first();

         // Asign values to varables from the database data
        $ID = $row->ID;
        $userID = $row->UserID;
        $groupID = $row->GroupID;

         // create and return the model
        return new AffinityGroupUserModel($ID, $userID, $groupID);
    }

     /**
     * Gets the model from the table by userID and groupID
     * @param int $userID
     * @param int $groupID
     * @return boolean|AffinityGroupUserModel
     *  : FALSE-User is not in the group | The requested model
     */
    public function GetRowModelByUserIDNGroupID(int $userID, int $groupID)
    {
        // Check to see if the user is not in that group
        if(!$this->IsUserInGroup($userID, $groupID)) return FALSE;

         // Get the row data from the database
        $row = DB::table($this->table)->where('UserID', $userID)->where('GroupID', $groupID)->first();

         // Asign values to varables from the database data
        $ID = $row->ID;
        $userID = $row->UserID;
        $groupID = $row->GroupID;

         // create and return the model
        return new AffinityGroupUserModel($ID, $userID, $groupID);
    }



     // [Get Row ID] [Get Row ID] [Get Row ID] [Get Row ID] [Get Row ID] [Get Row ID] [Get Row ID] [Get Row ID] [Get Row ID] [Get Row ID] [Get Row ID] [Get Row ID] [Get Row ID] [Get Row ID]

     /**
     * Gets the row ID from the table by userID and groupID
     * @param int $userID
     * @param int $groupID
     * @return boolean|number
     */
    public function GetRowIDByUserIDNGroupID(int $userID, int $groupID)
    {
        // Check to see if the user is not in that group
        if(!$this->IsUserInGroup($userID, $groupID)) return FALSE;

         // Get the row data from the database
        $row = DB::table($this->table)->where('UserID', $userID)->where('GroupID', $groupID)->first('ID');

         // Return the row id
        return (int)$row->ID;
    }



     // [Get Row IDs] [Get Row IDs] [Get Row IDs] [Get Row IDs] [Get Row IDs] [Get Row IDs] [Get Row IDs] [Get Row IDs] [Get Row IDs] [Get Row IDs] [Get Row IDs] [Get Row IDs] [Get Row IDs]

     /**
     * Gets the row id's by the user id
     * @param int $userID
     * @return boolean|int[]
     *  : FALSE-User is not in a group | Row id's
     */
    public function GetRowIDsByUserID(int $userID)
    {
        // Check to see if the user is not in a group
        if(!$this->IsUserInAGroup($userID)) return FALSE;

         // Get the row ids from the database
        $results = DB::table($this->table)->where('UserID', $userID)->get('ID');

         // Create results array
        $rows = array();

         // Loop through all results
        foreach($results as $row)
        {
            // Add row id to $rows array
            array_push($rows, (int)$row->ID);
        }

         // return the row ids
        return $rows;
    }

     /**
     * Gets the row id's by the group id
     * @param int $groupID
     * @return boolean|int[]
     */
    public function GetRowIDsByGroupID(int $groupID)
    {
        // Check to see if the group has users
        if(!$this->DoesGroupHaveUsers($groupID)) return FALSE;

         // Get the row ids from the database
        $results = DB::table($this->table)->where('GroupID', $groupID)->get('UserID');
       
       
     

         // Create results array
        $rows = array();

         // Loop through all results
        foreach($results as $row)
        {
            // Add row id to $rows array
            array_push($rows, (int)$row->UserID);
        }
        
       
         // return the row ids
        return $rows;
    }

     /**
     * Gets all of the row ID's from the database
     * @return int[] : Row ID's
     */
    public function GetAllRowIDs()
    {
        // Get the row ids from the database
        $results = DB::table($this->table)->get('ID');

         // Create results array
        $rows = array();

         // Loop through all results
        foreach($results as $row)
        {
            // Add row id to $rows array
            array_push($rows, (int)$row->ID);
        }

         // return the row ids
        return $rows;
    }



     // [Delete Row] [Delete Row] [Delete Row] [Delete Row] [Delete Row] [Delete Row] [Delete Row] [Delete Row] [Delete Row] [Delete Row] [Delete Row] [Delete Row] [Delete Row]

     /**
     * Deletes the row in the table by ID
     * @param int $id
     * @return boolean
     */
    public function DeleteRowByID(int $id)
    {
        // Check to see if row doesn't exist
        if(!$this->DoesRowExists($id)) return TRUE;

         // Delete the row from the table
        $result = DB::table($this->table)->where('ID', $id)->delete();

         if($result > 0) return TRUE;
        else return FALSE;
    }
    
    public function GetNameByID($userid)
    {
        $results = DB::table('users')->where('id', $userid)->get('name');
        $rows = array();
        foreach($results as $row)
        {
            // Add row id to $rows array
            array_push($rows, $row->name);
        }
        
        return $rows;
    }

 }

