<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

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
 //   protected $hidden = array('password', 'remember_token');

//    public function getRememberToken() {
//        return null; // not supported
//    }
//
//    public function setRememberToken($value) {
//        // not supported
//    }
//
//    public function getRememberTokenName() {
//        return null; // not supported
//    }
//
//    /**
//     * Overrides the method to ignore the remember token.
//     */
//    public function setAttribute($key, $value) {
//        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
//        if (!$isRememberTokenAttribute) {
//            parent::setAttribute($key, $value);
//        }
//    }

}
