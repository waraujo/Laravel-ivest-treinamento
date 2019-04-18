<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


/**
 * Class Instituition.
 *
 * @package namespace App\Entities;
 */
class Instituition extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['nome'];
    public $timestamps = true;

    public function groups()
    {
    	/**
    	 * comando para retornar valores da classe grupo que tenha relação com a instituição no modem 1:N
    	 * onde 1 grupo tenha uma instituição porém uma intituição podera ter varios grupos.
    	 */
    	return $this->hasMany(Group::class);
    }

}
