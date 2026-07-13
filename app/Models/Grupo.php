<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Grupo
 * 
 * @property int $id
 * @property int $academia_id
 * @property int $programa_id
 * @property int $horario_id
 * @property int $periodo_academico_id
 * @property string $codigo
 * @property string $nombre
 * @property string|null $color
 * @property string|null $descripcion
 * @property int|null $cupo_maximo
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_fin
 * @property string|null $estado
 * @property string|null $observaciones
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Academia $academia
 * @property Horario $horario
 * @property PeriodosAcademico $periodos_academico
 * @property Programa $programa
 * @property Collection|Clase[] $clases
 * @property Collection|Profesore[] $profesores
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Grupo extends Model
{
	protected $table = 'grupos';

	protected $casts = [
		'academia_id' => 'int',
		'programa_id' => 'int',
		'horario_id' => 'int',
		'periodo_academico_id' => 'int',
		'cupo_maximo' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime'
	];

	protected $fillable = [
		'academia_id',
		'programa_id',
		'horario_id',
		'periodo_academico_id',
		'codigo',
		'nombre',
		'color',
		'descripcion',
		'cupo_maximo',
		'fecha_inicio',
		'fecha_fin',
		'estado',
		'observaciones'
	];

	public function academia()
	{
		return $this->belongsTo(Academia::class);
	}

	public function horario()
	{
		return $this->belongsTo(Horario::class);
	}

	public function periodos_academico()
	{
		return $this->belongsTo(PeriodosAcademico::class, 'periodo_academico_id');
	}

	public function programa()
	{
		return $this->belongsTo(Programa::class);
	}

	public function clases()
	{
		return $this->hasMany(Clase::class);
	}

	public function profesores()
	{
		return $this->belongsToMany(Profesore::class, 'grupo_profesores', 'grupo_id', 'profesor_id')
					->withPivot('id', 'fecha_inicio', 'fecha_fin', 'es_principal')
					->withTimestamps();
	}

	public function matriculas()
	{
		return $this->hasMany(Matricula::class);
	}
}
