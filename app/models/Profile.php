<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 07/07/2014
 * Time: 18:06
 */

class Profile extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profile';

    public function user()
    {
        return $this->belongsTo('User');
    }

}