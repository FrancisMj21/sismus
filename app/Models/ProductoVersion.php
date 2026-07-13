<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductoVersione
 * 
 * @property int $id
 * @property int $producto_id
 * @property int $version
 * @property string|null $nombre
 * @property float $precio
 * @property int $duracion_dias
 * @property string|null $beneficio_tipo
 * @property string|null $beneficio_unidad
 * @property int|null $beneficio_cantidad
 * @property Carbon $fecha_inicio_vigencia
 * @property Carbon|null $fecha_fin_vigencia
 * @property string|null $observaciones
 * @property bool|null $activo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Producto $producto
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class ProductoVersion
 extends Model
{
	protected $table = 'producto_versiones';

	protected $casts = [
		'producto_id' => 'int',
		'version' => 'int',
		'precio' => 'float',
		'duracion_dias' => 'int',
		'beneficio_cantidad' => 'int',
		'fecha_inicio_vigencia' => 'datetime',
		'fecha_fin_vigencia' => 'datetime',
		'activo' => 'bool'
	];

	protected $fillable = [
		'producto_id',
		'version',
		'nombre',
		'precio',
		'duracion_dias',
		'beneficio_tipo',
		'beneficio_unidad',
		'beneficio_cantidad',
		'fecha_inicio_vigencia',
		'fecha_fin_vigencia',
		'observaciones',
		'activo'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class);
	}

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'producto_version_id');
	}
}
