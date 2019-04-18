<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;


    public $timestamps = true;
    protected $table = 'users';
    protected $fillable = ['cpf', 'nome', 'phone','birth','gender','notes','email','password','status','permission',];
    protected $hidden = ['password', 'remember_token',];
/**função para criação de mascara de uma informação para ser demonstrada pelo front-end */
    public function groups()
    {
        /**Relacionamentos N:N */
        return $this->bolongsToMany(User::class,'user_groups');
    }    

    public function setPasswordAttribute($value){
        $this->attributes['password'] = env('PASSWORD_HASH')? bcrypt($value):$value;
    }
    public function getFormattedCpfAttribute()
    {
    	$cpf = $this->attributes['cpf'];

    	return substr($cpf, 0,3).'.'.substr($cpf, 4,3).'.'.substr($cpf, 7,3).'-'.substr($cpf, -2);
    }
    public function getFormattedPhoneAttribute()
    {
    	$phone = $this->attributes['phone'];
    	
    	if (strlen($phone > 10)) 
    	{
    		return '('.substr($phone, 0,2).') '.substr($phone, 2,5).'-'.substr($phone, -4);
    	}
        else
        {
        	return '('.substr($phone, 0,2).') '.substr($phone, 2,4).'-'.substr($phone, -4);
        }
    }
    public function getFormattedBirthAttribute()
    {
    	
    	$birth = explode('-',$this->attributes['birth']);
    	if (count($birth)!=3) 
    	{
			return  " ";	
		}
		else
		{
			return $birth[2].'/'.$birth[1].'/'.$birth[0];
		}    	
    	
    	
    }

}

