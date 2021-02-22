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
        
        echo "charList:";
        print_r($charList);
        
        echo "Size of charList:";
        var_dump(sizeof($charList));
        
        $x = 0;
        $tag = "";
        for($i = 0; $i < sizeof($charList)-1; $i++);
        {
            echo "Val of x:";
            var_dump($x);
            echo "Val of i:";
            var_dump($i);
            // If the x iterator is 0
            if($x == 0)
            {
                // If the char is a tag start charater
                if($charList[$i] == "$")
                {
                    $tag = $tag . $charList[$i];
                    $x++;
                }
            }
            else 
            {
                if($charList[$i] == ' ' || $i == sizeof($charList)-1)
                {
                    echo "tag:";
                    var_dump($tag);
                    array_push($tagsListS, $tag);
                    $tag = "";
                    $x = 0;
                }
                else
                {
                    $tag = $tag . $charList[$i];
                    $x++;
                }
            }
        }
        
        echo "TagsListS:";
        print_r($tagsListS);
        
        // Convert Tag strings to Tags
        $output = array();
        foreach ($tagsListS as $Tag)
        {
            array_push($output, new TagsModel(0, $Tag, $Tag));
        }
        echo "output:";
        print_r($output);
        
        // Return the translated tags
        return $output;
    }
    
    /**
     * Searches through then entered string for tags.
     * The tag start char is '#' and ends with a ' '.
     * @param string $input
     * @return TagsModel[] : All of the tags from the string
     */
    public function GetTagsFromStringTEST(string $input)
    {
        $tagsListS = array();
        
        $words = explode(" ", $input);
        
        echo "words:";
        print_r($words);
        
        foreach ($words as $tag)
        {
            $str = str_split($tag);
            if($str[0] == "#") array_push($tagsListS, $tag);
        }
        
        
        echo "TagsListS:";
        print_r($tagsListS);
        
        // Convert Tag strings to Tags
        $output = array();
        foreach ($tagsListS as $Tag)
        {
            array_push($output, new TagsModel(0, $Tag, $Tag));
        }
        echo "output:";
        print_r($output);
        
        // Return the translated tags
        return $output;
    }
}

