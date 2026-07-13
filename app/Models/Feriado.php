<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Feriado
 * 
 * @property int $id
 * @property int $academia_id
 * @property string $nombre
 * @property Carbon $fecha
 * @property string|null $tipo
 * @property string|null $descripcion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Academia $academia
 *
 * @package App\Models
 */
class Feriado extends Model
{
	protected $table = 'feriados';

	protected $casts = [
		'academia_id' => 'int',
		'fecha' => 'datetime'
	];

	protected $fillable = [
		'academia_id',
		'nombre',
		'fecha',
		'tipo',
		'descripcion'
	];

	public function academia()
	{
		return $this->belongsTo(Academia::class);
	}
}
