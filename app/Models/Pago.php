<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 * 
 * @property int $id
 * @property int $cuota_id
 * @property int $usuario_id
 * @property Carbon $fecha_pago
 * @property float $monto
 * @property string|null $metodo_pago
 * @property string|null $numero_operacion
 * @property string|null $observaciones
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Cuota $cuota
 * @property User $user
 *
 * @package App\Models
 */
class Pago extends Model
{
	protected $table = 'pagos';

	protected $casts = [
		'cuota_id' => 'int',
		'usuario_id' => 'int',
		'fecha_pago' => 'datetime',
		'monto' => 'float'
	];

	protected $fillable = [
		'cuota_id',
		'usuario_id',
		'fecha_pago',
		'monto',
		'metodo_pago',
		'numero_operacion',
		'observaciones'
	];

	public function cuota()
	{
		return $this->belongsTo(Cuota::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'usuario_id');
	}
}
