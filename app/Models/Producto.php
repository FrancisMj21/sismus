<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $id
 * @property int $academia_id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string|null $tipo
 * @property bool|null $activo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Academia $academia
 * @property Collection|ProductoVersione[] $producto_versiones
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';

	protected $casts = [
		'academia_id' => 'int',
		'activo' => 'bool'
	];

	protected $fillable = [
		'academia_id',
		'nombre',
		'descripcion',
		'tipo',
		'activo'
	];

	public function academia()
	{
		return $this->belongsTo(Academia::class);
	}

	public function producto_versiones()
	{
		return $this->hasMany(ProductoVersione::class);
	}
}
