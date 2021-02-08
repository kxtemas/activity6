<?php
namespace App\Models;

class User
{
    
    //class member variables
    private $id;
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $role;
    
    
    //constructor
    function __construct($id, $email, $password, $firstName, $lastName, $role) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        //$this->rights = $rights;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->role = $role;
    }
    
    
    //getters and setters
    
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
 
    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @return mixed
     */
    public function setName($name)
    {
        return $this->name= $name;
    }
    
    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    
    
    
    
}