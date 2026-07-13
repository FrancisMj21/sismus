<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Clase
 * 
 * @property int $id
 * @property int $grupo_id
 * @property int $horario_id
 * @property int $profesor_id
 * @property Carbon $fecha
 * @property string|null $estado
 * @property string|null $observaciones
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Grupo $grupo
 * @property Horario $horario
 * @property Profesore $profesore
 * @property Collection|Asistencia[] $asistencias
 *
 * @package App\Models
 */
class Clase extends Model
{
	protected $table = 'clases';

	protected $casts = [
		'grupo_id' => 'int',
		'horario_id' => 'int',
		'profesor_id' => 'int',
		'fecha' => 'datetime'
	];

	protected $fillable = [
		'grupo_id',
		'horario_id',
		'profesor_id',
		'fecha',
		'estado',
		'observaciones'
	];

	public function grupo()
	{
		return $this->belongsTo(Grupo::class);
	}

	public function horario()
	{
		return $this->belongsTo(Horario::class);
	}

	public function profesore()
	{
		return $this->belongsTo(Profesore::class, 'profesor_id');
	}

	public function asistencias()
	{
		return $this->hasMany(Asistencia::class, 'clase_original_id');
	}
}
