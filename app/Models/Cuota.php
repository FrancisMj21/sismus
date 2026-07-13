<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuota
 * 
 * @property int $id
 * @property int $matricula_id
 * @property int $numero
 * @property string $concepto
 * @property Carbon $fecha_vencimiento
 * @property float $monto
 * @property string|null $estado
 * @property string|null $observaciones
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Matricula $matricula
 * @property Collection|Pago[] $pagos
 *
 * @package App\Models
 */
class Cuota extends Model
{
	protected $table = 'cuotas';

	protected $casts = [
		'matricula_id' => 'int',
		'numero' => 'int',
		'fecha_vencimiento' => 'datetime',
		'monto' => 'float'
	];

	protected $fillable = [
		'matricula_id',
		'numero',
		'concepto',
		'fecha_vencimiento',
		'monto',
		'estado',
		'observaciones'
	];

	public function matricula()
	{
		return $this->belongsTo(Matricula::class);
	}

	public function pagos()
	{
		return $this->hasMany(Pago::class);
	}
}
