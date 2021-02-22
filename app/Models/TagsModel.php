<?php
namespace App\Models;

class TagsModel
{

    private $id;
    private $name;
    private $searchTerm;
    
    
    public function __construct(int $id, string $name, string $searchTerm)
    {
        $this->id = $id;
        $this->name = $name;
        $this->searchTerm = $searchTerm;        
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @return string
     */
    public function getSearchTerm()
    {
        return $this->searchTerm;
    }
    
    /**
     * Compares the two tag models
     * @param TagsModel $tags
     * @return boolean
     */
    public function Equals(TagsModel $tags)
    {
        // If the id's don't match
        if($this->id != $tags->getId()) return FALSE;
        
        // If the names don't match
        if($this->name != $tags->getName()) return FALSE;
        
        // If the search terms don't match
        if($this->searchTerm != $tags->getSearchTerm()) return FALSE;
        
        // The two models are the same
        return TRUE;
    }
}

