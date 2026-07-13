<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Matricula
 * 
 * @property int $id
 * @property int $academia_id
 * @property int $alumno_id
 * @property int $grupo_id
 * @property int $producto_version_id
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_fin
 * @property Carbon|null $beneficio_inicio
 * @property Carbon|null $beneficio_fin
 * @property Carbon $vigente_hasta
 * @property float $precio
 * @property float|null $descuento
 * @property string|null $estado
 * @property string|null $observaciones
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Academia $academia
 * @property Alumno $alumno
 * @property Grupo $grupo
 * @property ProductoVersione $producto_versione
 * @property Collection|Asistencia[] $asistencias
 * @property Collection|Cuota[] $cuotas
 * @property Collection|HistorialMatricula[] $historial_matriculas
 * @property Collection|Repertorio[] $repertorios
 *
 * @package App\Models
 */
class Matricula extends Model
{
	protected $table = 'matriculas';

	protected $casts = [
		'academia_id' => 'int',
		'alumno_id' => 'int',
		'grupo_id' => 'int',
		'producto_version_id' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime',
		'beneficio_inicio' => 'datetime',
		'beneficio_fin' => 'datetime',
		'vigente_hasta' => 'datetime',
		'precio' => 'float',
		'descuento' => 'float'
	];

	protected $fillable = [
		'academia_id',
		'alumno_id',
		'grupo_id',
		'producto_version_id',
		'fecha_inicio',
		'fecha_fin',
		'beneficio_inicio',
		'beneficio_fin',
		'vigente_hasta',
		'precio',
		'descuento',
		'estado',
		'observaciones'
	];

	public function academia()
	{
		return $this->belongsTo(Academia::class);
	}

	public function alumno()
	{
		return $this->belongsTo(Alumno::class);
	}

	public function grupo()
	{
		return $this->belongsTo(Grupo::class);
	}

	public function producto_versione()
	{
		return $this->belongsTo(ProductoVersione::class, 'producto_version_id');
	}

	public function asistencias()
	{
		return $this->hasMany(Asistencia::class);
	}

	public function cuotas()
	{
		return $this->hasMany(Cuota::class);
	}

	public function historial_matriculas()
	{
		return $this->hasMany(HistorialMatricula::class);
	}

	public function repertorios()
	{
		return $this->hasMany(Repertorio::class);
	}
}
