<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HorarioDia
 * 
 * @property int $id
 * @property int $horario_id
 * @property string $dia_semana
 * 
 * @property Horario $horario
 *
 * @package App\Models
 */
class HorarioDia extends Model
{
	protected $table = 'horario_dias';
	public $timestamps = false;

	protected $casts = [
		'horario_id' => 'int'
	];

	protected $fillable = [
		'horario_id',
		'dia_semana'
	];

	public function horario()
	{
		return $this->belongsTo(Horario::class);
	}
}
