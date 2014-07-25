<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait, HasRole;

    protected $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    public function profile()
    {
        return $this->hasOne('Profile');
    }

    public function passwordrequest()
    {
        return $this->hasMany('PasswordRequest');
    }

    public function socialaccount()
    {
        return $this->hasMany('SocialAccount');
    }

//    public function getValidUsers() {
//        return User::where()
//            ->where()
//            ->get();
//    }

    public static function toInputSelectArray($users) {
        $inputSelectArray = array();

        $inputSelectArray[0] = 'None';

        foreach($users as $user) {
            $inputSelectArray[$user->id] = $user->email;
        }

        return $inputSelectArray;
    }
}
