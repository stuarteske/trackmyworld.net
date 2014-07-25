<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 14/07/2014
 * Time: 08:13
 */

class PasswordRequest extends Eloquent {

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'password_request';

    public function user()
    {
        return $this->belongsTo('User');
    }

}