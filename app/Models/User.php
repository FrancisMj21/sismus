<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * 
 * @property int $id
 * @property int $academia_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $telefono
 * @property bool|null $activo
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Academia $academia
 * @property Collection|Archivo[] $archivos
 * @property Collection|Asistencia[] $asistencias
 * @property Collection|HistorialMatricula[] $historial_matriculas
 * @property Collection|Pago[] $pagos
 * @property Collection|Profesore[] $profesores
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasRoles;

	protected $table = 'users';

	protected $casts = [
        'academia_id' => 'integer',
        'activo' => 'boolean',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'academia_id',
		'name',
		'email',
		'password',
		'telefono',
		'activo',
		'remember_token'
	];


	public function alumno()
	{
		return $this->hasOne(Alumno::class);
	}
	public function academia()
	{
		return $this->belongsTo(Academia::class);
	}

	public function archivos()
	{
		return $this->hasMany(Archivo::class, 'usuario_id');
	}

	public function asistencias()
	{
		return $this->hasMany(Asistencia::class, 'created_by');
	}

	public function historial_matriculas()
	{
		return $this->hasMany(HistorialMatricula::class, 'usuario_id');
	}

	public function pagos()
	{
		return $this->hasMany(Pago::class, 'usuario_id');
	}

	public function profesores()
	{
		return $this->hasMany(Profesore::class);
	}
}
