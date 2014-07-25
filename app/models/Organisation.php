<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 17/07/2014
 * Time: 18:21
 */

class Organisation extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation';

    public function owner()
    {
        return $this->belongsTo('User');
    }

}