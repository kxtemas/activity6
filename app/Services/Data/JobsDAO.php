<?php
namespace App\Services\Data;

use App\Job;
use App\Models\JobModel;
use Illuminate\Support\Facades\DB;

class JobsDAO
{
    private $table;
    public function __construct()
    {
        $this->table = "jobs";
    }
    
    /**
     * Returns all of the jobs in the database
     * @return \Illuminate\Database\Eloquent\Collection|\App\Job[]
     */
    public function getAllJobs()
    {
        // Return Job Models
        return Job::all();
    }
    
    /**
     * Gets a Job Model by id number
     * @param int $id
     * @return \App\Job
     */
    public function getJobByID(int $id)
    {
        return Job::findOrFail($id);
    }
    
    /**
     * Returns an array of Jobs that contain the keyword in the target collum.
     * @param string $keyword : The keyword to look for.
     * @param string $targetCol : The target collum to look for the keyword in.
     * @return Job[]
     */
    public function getJobsByKeyword($keyword,$targetCol)
    {
        // Create jobs array
//         $jobs = array();
        
        // Get the jobs from the DB with the keyword
//         $result = Job::query()->where($targetCol, 'LIKE', "%{$keyword}%")->get();
        return Job::query()->where($targetCol, 'LIKE', "%{$keyword}%")->get();
        
        
//         // Loop through all of the results
//         foreach($result as $row)
//         {
//             $job = new Job();
//             $job->title = $row->title;
//             $job->description = $row->description;
//             $job->location = $row->location;
//             $job->type = $row->type;
//             $job->pay_range = $row->pay_range;
//             $job->company = $row->company;
//             $job->employment = $row->employment;
//             $job->phonenumber = $row->phonenumber;
//             $job->email = $row->email;
            
//             // Add job to jobs array
//             array_push($jobs, $job);
//         }
        
//         // return the results of the querry
//         return $jobs;
    }
    
    /**
     * Deletes the Job by id number
     * @param int $id
     * @return boolean|NULL
     */
    public function deleteJobByID(int $id)
    {
        $job = $this->getJobByID($id);
        return $job->delete();
    }
    
    /**
     * Adds the Model to the database.
     * @param $model : Both Job models will work.
     * @return boolean
     */
    public function addJobByModel($model)
    {
        // Is model a JobModel
        if(is_a($model, "JobModel")) 
        {
            // Convert the JobModel to Job
            $model = $model->convertToIlluminateJobModel()[1];
        }
        elseif(is_a($model, "Job"))
        {
           // Do nothing
        }
        // If any other object type comes in
        else return FALSE;
        
        // Add job into the database
        $model->save();
        
    }

    /**
     * Updates the job listing by the model and id number
     * @param $model : Both Job models will work.
     * @param $id int : Job id number.
     * @return boolean
     */
    public function updateJobByModel($model, $id)
    {
        
        // Is model a JobModel
        if(is_a($model, "JobModel"))
        {
            // Convert the JobModel to Job
            $results = $model->convertToIlluminateJobModel()[1];
            //$id = $results[0];
            $model = $results[1];
        }
        elseif(is_a($model, "Job"))
        {
            // Do nothing
        }
        // If any other object type comes in
        else return FALSE;
        
        //Get the Job from the database
        $job = $this->getJobByID($id);
        
        // Apply the changes to the database job
        $job->title = $model->title;
        $job->description = $model->description;
        $job->location = $model->location;
        $job->type = $model->type;
        $job->pay_range = $model->pay_range;
        $job->company = $model->company;
        $job->employment = $model->employment;
        $job->phonenumber = $model->phonenumber;
        $job->email = $model->email;
        
        // Save the job to the database and return restult
        return $job->save();
    }

    /**
     * Updates a single property of a job in the database.
     * @param int $id : Job id number.
     * @param string $targetValue : The value to change.
     * @param string $updatedValue : The value the change the target to.
     * @return boolean
     */
    public function updateJobProperty($id, $targetValue, $updatedValue)
    {
        $job = $this->getJobByID($id);
        $job->$targetValue = $updatedValue;
        return $job->save();
    }
    
    public function findJob($keyword)
    {
        
        $query =
        "SELECT *
         FROM jobs
         WHERE (title LIKE %$keyword%
         OR description LIKE %$keyword%)";
        
       $job = DB::raw($query);
       return $job;
    }
    
    
}