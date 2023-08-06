<?php

namespace App\Domain\Player;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jugadores';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var String[]
     */
    protected $fillable = [
        'codalumno',
        'nombre',
        'apellido',
        'tantos_marcados',
        'puesto',
        'clase',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
