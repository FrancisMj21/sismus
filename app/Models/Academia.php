<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Academia
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $ruc
 * @property string|null $telefono
 * @property string|null $correo
 * @property string|null $direccion
 * @property string|null $logo
 * @property bool|null $activo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Alumno[] $alumnos
 * @property Collection|Archivo[] $archivos
 * @property Collection|Configuracione[] $configuraciones
 * @property Collection|Especialidade[] $especialidades
 * @property Collection|Feriado[] $feriados
 * @property Collection|Grupo[] $grupos
 * @property Collection|Horario[] $horarios
 * @property Collection|HorariosGenerale[] $horarios_generales
 * @property Collection|Matricula[] $matriculas
 * @property Collection|Notificacione[] $notificaciones
 * @property Collection|PeriodosAcademico[] $periodos_academicos
 * @property Collection|Producto[] $productos
 * @property Collection|Profesore[] $profesores
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Academia extends Model
{
	protected $table = 'academias';

	protected $casts = [
		'activo' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'ruc',
		'telefono',
		'correo',
		'direccion',
		'logo',
		'activo'
	];

	public function alumnos()
	{
		return $this->hasMany(Alumno::class);
	}

	public function archivos()
	{
		return $this->hasMany(Archivo::class);
	}

	public function configuraciones()
	{
		return $this->hasMany(Configuracione::class);
	}

	public function especialidades()
	{
		return $this->hasMany(Especialidade::class);
	}

	public function feriados()
	{
		return $this->hasMany(Feriado::class);
	}

	public function grupos()
	{
		return $this->hasMany(Grupo::class);
	}

	public function horarios()
	{
		return $this->hasMany(Horario::class);
	}

	public function horarios_generales()
	{
		return $this->hasMany(HorariosGenerale::class);
	}

	public function matriculas()
	{
		return $this->hasMany(Matricula::class);
	}

	public function notificaciones()
	{
		return $this->hasMany(Notificacione::class);
	}

	public function periodos_academicos()
	{
		return $this->hasMany(PeriodosAcademico::class);
	}

	public function productos()
	{
		return $this->hasMany(Producto::class);
	}

	public function profesores()
	{
		return $this->hasMany(Profesore::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
