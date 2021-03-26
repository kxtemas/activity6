<?php
namespace App\Models;
use App\Job;

class JobModel
{

    private $id, $title, $description, $location, $type, $pay, $company, $employment, $phone, $email;
    
    public function __construct($id, $title, $description, $location, $type, $pay, $company, $employment, $phone, $email)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->location = $location;
        $this->type = $type;
        $this->pay = $pay;
        $this->company = $company;
        $this->employment = $employment;
        $this->phone = $phone;
        $this->email = $email;
    }
    

    
    /**
     * Converts the model to the Illuminate Job Model.
     * 
     * @return array{ $id , Job} : First value in the array is the job ID.
     * Second value in the array is the Job Model
     */
    public function convertToIlluminateJobModel()
    {
        // Create output array
        $output = array();
        
        // Convert model properties to Illuminate Model
        $job = new Job();
        $job->title = $this->title;
        $job->description = $this->description;
        $job->location = $this->location;
        $job->pay_range = $this->pay;
        $job->type = $this->type;
        $job->company = $this->company;
        $job->employment = $this->employment;
        $job->phonenumber = $this->phone;
        $job->email = $this->email;
        
        // Put Job id into position 0
        $output[0] = $this->id;
        // Put Job model into position 1
        $output[1] = $job;
        
        // Return array
        return $output;
        
    }
    
    /**
     * Converts the IlluminateJobModel into JobModel with a -1 id. 
     * Set the proper id number after converting.
     * @param Job $job
     */
    public function convertFromIlluminateJobModel(Job $job)
    {
        $this->id = -1;
        $this->title = $job->title;
        $this->description = $job->description;
        $this->location = $job->location;
        $this->type = $job->type;
        $this->pay = $job->pay_range;
        $this->company = $job->company;
        $this->employment = $job->employment;
        $this->phone = $job->phonenumber;
        $this->email = $job->email;
    }
    
    /**
     * Compares the two Job models
     * @param JobModel $model
     * @return boolean
     */
    public function equals(JobModel $model)
    {
        // If the id's don't match
        if($this->id != $model->getId()) return FALSE;
        
        // If the titles don't match
        if($this->title != $model->getTitle()) return FALSE;
        
        // If the descriptions don't match
        if($this->description != $model->getDescription()) return FALSE;
        
        // If the Locations don't match
        if($this->location != $model->getLocation()) return FALSE;
        
        // If the types don't match
        if($this->type != $model->getType()) return FALSE;
        
        // If the Pays don't match
        if($this->pay != $model->getPay()) return FALSE;
        
        // If the Companies don't match
        if($this->company != $model->getCompany()) return FALSE;
        
        // If the Employments don't match
        if($this->employment != $model->getEmployment()) return FALSE;
        
        // If the PhoneNumbers don't match
        if($this->phone != $model->getPhone()) return FALSE;
        
        // If the Emails don't match
        if($this->email != $model->getEmail()) return FALSE;
        
        // The two models are the same
        return TRUE;
    }
    
    
    public function getValuesArray()
    {
        // Create Values Array()
        $values =
        [
            'title' => $this->title,
            'description' => $this->description,
            'location' => $this->location,
            'type' => $this->type,
            'pay_range' => $this->pay,
            'company' => $this->company,
            'employment' => $this->employment,
            'phonenumber' => $this->phone,
            'email' => $this->email
        ];
        
        // Return the values array
        return $values;
    }
    
    
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }
    
    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * @return mixed
     */
    public function getPay()
    {
        return $this->pay;
    }
    
    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }
    
    /**
     * @return mixed
     */
    public function getEmployment()
    {
        return $this->employment;
    }
    
    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }
    
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }
    
    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    
    /**
     * @param mixed $pay
     */
    public function setPay($pay)
    {
        $this->pay = $pay;
    }
    
    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }
    
    /**
     * @param mixed $employment
     */
    public function setEmployment($employment)
    {
        $this->employment = $employment;
    }
    
    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    
    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
}