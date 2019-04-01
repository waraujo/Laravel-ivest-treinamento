<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Group.
 *
 * @package namespace App\Entities;
 */
class Group extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome','user_id','instituition_id'];
/** funcção para criar relação com outras tabelas */
    public function owner()
    {
    	return $this->belongsTo(User::class,'user_id');
    }
    public function instituition()
    {
    	return $this->belongsTo(Instituition::class);	
    }
}
