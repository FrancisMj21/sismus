<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Alumno
 * 
 * @property int $id
 * @property int $academia_id
 * @property string|null $codigo
 * @property string|null $dni
 * @property string|null $nombres
 * @property string|null $apellidos
 * @property Carbon|null $fecha_nacimiento
 * @property string|null $telefono
 * @property string|null $correo
 * @property string|null $direccion
 * @property string|null $contacto_emergencia
 * @property string|null $telefono_emergencia
 * @property Carbon|null $fecha_registro
 * @property string|null $observaciones
 * @property bool|null $activo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Academia $academia
 * @property Collection|Matricula[] $matriculas
 * @property Collection|Notificacione[] $notificaciones
 *
 * @package App\Models
 */
class Alumno extends Model
{
	protected $table = 'alumnos';

	protected $casts = [
		'academia_id' => 'int',
		'fecha_nacimiento' => 'datetime',
		'fecha_registro' => 'datetime',
		'activo' => 'bool'
	];

	protected $fillable = [
		'academia_id',
		'codigo',
		'dni',
		'nombres',
		'apellidos',
		'fecha_nacimiento',
		'telefono',
		'correo',
		'direccion',
		'contacto_emergencia',
		'telefono_emergencia',
		'fecha_registro',
		'observaciones',
		'activo'
	];

	public function academia()
	{
		return $this->belongsTo(Academia::class);
	}

	public function matriculas()
	{
		return $this->hasMany(Matricula::class);
	}

	public function notificaciones()
	{
		return $this->hasMany(Notificacione::class);
	}
}
