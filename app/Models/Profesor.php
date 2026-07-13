<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Profesore
 * 
 * @property int $id
 * @property int $academia_id
 * @property int|null $user_id
 * @property string|null $dni
 * @property string $nombres
 * @property string $apellidos
 * @property Carbon|null $fecha_nacimiento
 * @property string|null $telefono
 * @property string|null $correo
 * @property string|null $direccion
 * @property Carbon|null $fecha_ingreso
 * @property bool|null $activo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Academia $academia
 * @property User|null $user
 * @property Collection|Clase[] $clases
 * @property Collection|Grupo[] $grupos
 * @property Collection|ProfesorEspecialidade[] $profesor_especialidades
 * @property Collection|Repertorio[] $repertorios
 *
 * @package App\Models
 */
class Profesor extends Model
{
	protected $table = 'profesores';

	protected $casts = [
		'academia_id' => 'integer',
		'user_id' => 'integer',
		'fecha_nacimiento' => 'date',
		'fecha_ingreso' => 'date',
		'activo' => 'boolean'
	];

	protected $fillable = [
		'academia_id',
		'user_id',
		'dni',
		'nombres',
		'apellidos',
		'fecha_nacimiento',
		'telefono',
		'correo',
		'direccion',
		'fecha_ingreso',
		'activo'
	];

	public function academia()
	{
		return $this->belongsTo(Academia::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function clases()
	{
		return $this->hasMany(Clase::class, 'profesor_id');
	}

	public function grupos()
	{
		return $this->belongsToMany(Grupo::class, 'grupo_profesores', 'profesor_id')
					->withPivot('id', 'fecha_inicio', 'fecha_fin', 'es_principal')
					->withTimestamps();
	}

	public function profesor_especialidades()
	{
		return $this->hasMany(ProfesorEspecialidade::class, 'profesor_id');
	}

	public function repertorios()
	{
		return $this->hasMany(Repertorio::class, 'profesor_id');
	}
}
