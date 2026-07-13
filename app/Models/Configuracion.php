<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Configuracione
 * 
 * @property int $id
 * @property int $academia_id
 * @property string $clave
 * @property string|null $valor
 * @property string|null $descripcion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Academia $academia
 *
 * @package App\Models
 */
class Configuracion extends Model
{
	protected $table = 'configuraciones';

	protected $casts = [
		'academia_id' => 'int'
	];

	protected $fillable = [
		'academia_id',
		'clave',
		'valor',
		'descripcion'
	];

	public function academia()
	{
		return $this->belongsTo(Academia::class);
	}
}
