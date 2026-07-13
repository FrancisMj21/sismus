<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HorariosGenerale
 * 
 * @property int $id
 * @property int $academia_id
 * @property int $especialidad_id
 * @property string|null $nombre
 * @property Carbon|null $fecha_inicio
 * @property Carbon|null $fecha_fin
 * @property bool|null $activo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Academia $academia
 * @property Especialidade $especialidade
 * @property Collection|HorarioGeneralDia[] $horario_general_dias
 *
 * @package App\Models
 */
class HorariosGeneral
 extends Model
{
	protected $table = 'horarios_generales';

	protected $casts = [
		'academia_id' => 'int',
		'especialidad_id' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime',
		'activo' => 'bool'
	];

	protected $fillable = [
		'academia_id',
		'especialidad_id',
		'nombre',
		'fecha_inicio',
		'fecha_fin',
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

	public function horario_general_dias()
	{
		return $this->hasMany(HorarioGeneralDia::class, 'horario_general_id');
	}
}
