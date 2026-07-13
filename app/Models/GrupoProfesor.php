<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GrupoProfesor
 * 
 * @property int $id
 * @property int $grupo_id
 * @property int $profesor_id
 * @property Carbon $fecha_inicio
 * @property Carbon|null $fecha_fin
 * @property bool|null $es_principal
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Grupo $grupo
 * @property Profesore $profesore
 *
 * @package App\Models
 */
class GrupoProfesor extends Model
{
	protected $table = 'grupo_profesores';

	protected $casts = [
		'grupo_id' => 'int',
		'profesor_id' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime',
		'es_principal' => 'bool'
	];

	protected $fillable = [
		'grupo_id',
		'profesor_id',
		'fecha_inicio',
		'fecha_fin',
		'es_principal'
	];

	public function grupo()
	{
		return $this->belongsTo(Grupo::class);
	}

	public function profesore()
	{
		return $this->belongsTo(Profesore::class, 'profesor_id');
	}
}
