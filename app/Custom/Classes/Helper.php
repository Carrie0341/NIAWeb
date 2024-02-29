<?php
namespace App\Custom\Classes;

class Helper 
{
    /**
     * Convert Array contains JSON strong to Array
     * @var array
     * @return array
     */
    public function json_parser($variable)
    {
        /* Array Contains JSON String */
        if( is_array($variable) )
        {
            foreach($variable as $key => $value)
            {
                json_decode($value);
                if(json_last_error() == JSON_ERROR_NONE)
                {
                    $variable[$key] = json_decode($value , true); 
                }
            }
            return $variable;
        }

        /* JSON String */
        else
        {
            json_decode($variable);
            if(json_last_error() == JSON_ERROR_NONE)
            {
                return json_decode($variable);
            }
        }

        /* Can't Convert */
        return $variable;
    }

    /**
     * Get two permission merge collect
     * @var array,array 
     * @return collect
     */
    public function permission($self , $group)
    {
        
        $mergePermission = [];
        if(isset($group["Function"]))
        {
            $groupPermission = $group["Function"];
            foreach($groupPermission as  $value)
            {
                array_push($mergePermission, collect($value)->flatten()->toArray());
            }
        }

        if(isset($self["Function"]))
        {
            $selfPermission = $self["Function"];
            foreach($selfPermission as $value)
            {
                array_push($mergePermission, collect($value)->flatten()->toArray());
            }
        }

        return collect($mergePermission)->collapse()->unique();
    }
}