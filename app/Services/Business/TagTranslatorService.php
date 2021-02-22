<?php
namespace App\Services\Business;


use App\Models\TagsModel;

class TagTranslatorService
{
    public function __construct()
    {}
    
    /**
     * Searches through then entered string for tags.
     * The tag start char is '#' and ends with a ' '.
     * @param string $input
     * @return TagsModel[] : All of the tags from the string
     */
    public function GetTagsFromString(string $input)
    {
        $tagsListS = array();
        $charList = str_split($input);
        
        $x = 0;
        $tag = "";
        foreach ($charList as $char)
        {
            // If the x iterator is 0
            if($x == 0)
            {
                // If the char is a tag start charater
                if($char == '#')
                {
                    $tag = $tag . $char;
                    $x++;
                }
            }
            else 
            {
                if($char == ' ')
                {
                    array_push($tagsListS, $tag);
                    $x = 0;
                }
                else
                {
                    $tag = $tag . $char;
                    $x++;
                }
            }
        }
        
        // Convert Tag strings to Tags
        $output = array();
        foreach ($tagsListS as $Tag)
        {
            array_push($output, new TagsModel(-1, $Tag, $Tag));
        }
        
        // Return the translated tags
        return $output;
    }
}

