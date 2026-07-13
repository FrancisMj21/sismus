<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notificacione
 * 
 * @property int $id
 * @property int $academia_id
 * @property int $alumno_id
 * @property string|null $tipo
 * @property string $titulo
 * @property string $mensaje
 * @property Carbon|null $fecha_envio
 * @property string|null $estado
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Academia $academia
 * @property Alumno $alumno
 *
 * @package App\Models
 */
class Notificacion extends Model
{
	protected $table = 'notificaciones';

	protected $casts = [
		'academia_id' => 'int',
		'alumno_id' => 'int',
		'fecha_envio' => 'datetime'
	];

	protected $fillable = [
		'academia_id',
		'alumno_id',
		'tipo',
		'titulo',
		'mensaje',
		'fecha_envio',
		'estado'
	];

	public function academia()
	{
		return $this->belongsTo(Academia::class);
	}

	public function alumno()
	{
		return $this->belongsTo(Alumno::class);
	}
}
