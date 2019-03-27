<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model

{
    use SoftDeletes;
    use Notifiable;

    public $timestamps = true;
    protected $table = 'users';
    protected $fillable = ['user_id', 'social_network', 'social_id','social_email','social_avatar',];
    protected $hidden = [];
}

