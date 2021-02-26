<?php
namespace App\Services\Data;

use App\Models\TagsModel;
use Illuminate\Support\Facades\DB;

class TagsDAO
{

    public function __construct()
    {}
    
    /**
     * Checks to see if the tag exists by its 
     *  id number in the database
     * @param int $id : the tag's id number
     * @return boolean
     */
    public function DoesTagExistByID(int $id)
    {
        return DB::table('tags')->where('ID', $id)->exists();
    }
    
    /**
     * Gets the tag's ID by its name
     * @param string $name
     * @return boolean|number : FALSE-No tag was found | The tag ID
     */
    public function GetTagIDByName(string $name)
    {
        $row = DB::table('tags')->where('Name', $name)->first();
        
        if($row == null) return FALSE;
        
        return (int)$row->ID;
    }
       
    /**
     * Gets the tag model from the table
     * @param int $id : The model's id number
     * @return boolean|\App\Models\TagsModel
     *  : FALSE-Tag does not exist | TagsModel-The requested TagsModel
     */
    public function GetTagModelByID(int $id)
    {
        // Check to see if the profile doesn't exists
        if(!($this->DoesTagExistByID($id))) return FALSE;
        
        // Get the row data from the database
        $row = DB::table('tags')->where('ID',$id)->first();
        
        // Asign values to varables from the database data
        $ID = $row->ID;
        $name = $row->Name;
        $searchTerm = $row->SearchTerm;
        
        // Create and return the model
        return new TagsModel($ID, $name, $searchTerm);
    }
    
    /**
     * Inserts the new tag into the table
     * @param TagsModel $model
     * @return boolean
     */
    public function AddNewTag(TagsModel $model)
    {
        // Convert $model to array
        $valuesArray = 
        [
            'Name' => $model->getName(),
            'SearchTerm' => $model->getSearchTerm()
        ];
        
        // Insert the tag into the table
        return DB::table('tags')->insert($valuesArray);
    }
    
    /**
     * 
     * @param TagsModel $model
     * @return boolean
     */
    public function UpdateTag(TagsModel $model)
    {
        // Check to see if the tag doesn't exists
        if(!($this->DoesTagExistByID($model->getId()))) return FALSE;
        
        // Check to see if the detials are the same
        if( $this->GetTagModelByID( $model->getId() )->Equals( $model ) ) return TRUE;
        
        // Convert $model to array
        $valuesArray =
        [
            'Name' => $model->getName(),
            'SearchTerm' => $model->getSearchTerm()
        ];
        
        // Insert the model into the table
        $result = DB::table('tags')->where('ID', $model->getId())->update($valuesArray);
    
        // Was more then one row updated
        if($result > 1) 
        {
            // Send message to admins about the issue
            // {code}
            
            // Check to see if the row was updated correctly
            if( $this->GetTagModelByID( $model->getId() )->Equals( $model ) ) 
                return TRUE;
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
}

