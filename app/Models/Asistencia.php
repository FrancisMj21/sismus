<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistencia
 * 
 * @property int $id
 * @property int $clase_id
 * @property int $matricula_id
 * @property string|null $estado
 * @property bool|null $es_recuperacion
 * @property int|null $clase_original_id
 * @property Carbon|null $fecha_recuperacion
 * @property string|null $motivo_recuperacion
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Clase|null $clase
 * @property Matricula $matricula
 * @property User|null $user
 *
 * @package App\Models
 */
class Asistencia extends Model
{
	protected $table = 'asistencias';

	protected $casts = [
		'clase_id' => 'int',
		'matricula_id' => 'int',
		'es_recuperacion' => 'bool',
		'clase_original_id' => 'int',
		'fecha_recuperacion' => 'datetime',
		'created_by' => 'int'
	];

	protected $fillable = [
		'clase_id',
		'matricula_id',
		'estado',
		'es_recuperacion',
		'clase_original_id',
		'fecha_recuperacion',
		'motivo_recuperacion',
		'created_by'
	];

	public function clase()
	{
		return $this->belongsTo(Clase::class, 'clase_original_id');
	}

	public function matricula()
	{
		return $this->belongsTo(Matricula::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'created_by');
	}
}
