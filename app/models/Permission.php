<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 21/07/2014
 * Time: 22:05
 */

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{

    public static function toInputSelectArray($permissions) {
        $inputSelectArray = array();

        $inputSelectArray[0] = 'None';

        foreach($permissions as $permission) {
            $inputSelectArray[$permission->id] = $permission->display_name;
        }

        return $inputSelectArray;
    }

}