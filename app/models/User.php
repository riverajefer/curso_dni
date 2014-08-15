<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

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

	/**************** Relaciones *******************/

    public function AmarilloPaginas()
    {
        return $this->hasOne('AmarilloPaginas');
    }

    public function RojoPaginas()
    {
        return $this->hasOne('RojoPaginas');
    }

    public function VerdePaginas()
    {
        return $this->hasOne('VerdePaginas');
    }

    public function DondeEstoy()
    {
        return $this->hasOne('DondeEstoy');
    }
}
