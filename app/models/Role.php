<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 21/07/2014
 * Time: 22:04
 */

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

    public static function toInputSelectArray($roles) {
        $inputSelectArray = array();

        $inputSelectArray[0] = 'None';

        foreach($roles as $role) {
            $inputSelectArray[$role->id] = $role->name;
        }

        return $inputSelectArray;
    }

}