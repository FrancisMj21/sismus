<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario
 * 
 * @property int $id
 * @property int $academia_id
 * @property int $especialidad_id
 * @property string|null $nombre
 * @property Carbon|null $hora_inicio
 * @property Carbon|null $hora_fin
 * @property string|null $tipo
 * @property bool|null $activo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Academia $academia
 * @property Especialidade $especialidade
 * @property Collection|Clase[] $clases
 * @property Collection|Grupo[] $grupos
 * @property Collection|HorarioDia[] $horario_dias
 *
 * @package App\Models
 */
class Horario extends Model
{
	protected $table = 'horarios';

	protected $casts = [
		'academia_id' => 'int',
		'especialidad_id' => 'int',
		'hora_inicio' => 'datetime',
		'hora_fin' => 'datetime',
		'activo' => 'bool'
	];

	protected $fillable = [
		'academia_id',
		'especialidad_id',
		'nombre',
		'hora_inicio',
		'hora_fin',
		'tipo',
		'activo'
	];

	public function academia()
	{
		return $this->belongsTo(Academia::class);
	}

	public function especialidade()
	{
		return $this->belongsTo(Especialidade::class, 'especialidad_id');
	}

	public function clases()
	{
		return $this->hasMany(Clase::class);
	}

	public function grupos()
	{
		return $this->hasMany(Grupo::class);
	}

	public function horario_dias()
	{
		return $this->hasMany(HorarioDia::class);
	}
}
