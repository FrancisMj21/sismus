<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HorarioGeneralDia
 * 
 * @property int $id
 * @property int $horario_general_id
 * @property string $dia_semana
 * 
 * @property HorariosGenerale $horarios_generale
 *
 * @package App\Models
 */
class HorarioGeneralDia extends Model
{
	protected $table = 'horario_general_dias';
	public $timestamps = false;

	protected $casts = [
		'horario_general_id' => 'int'
	];

	protected $fillable = [
		'horario_general_id',
		'dia_semana'
	];

	public function horarios_generale()
	{
		return $this->belongsTo(HorariosGenerale::class, 'horario_general_id');
	}
}
