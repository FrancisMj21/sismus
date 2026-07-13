<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Archivo
 * 
 * @property int $id
 * @property int $academia_id
 * @property string $entidad_tipo
 * @property int $entidad_id
 * @property string|null $tipo
 * @property string $nombre
 * @property string $nombre_original
 * @property string $extension
 * @property string $mime_type
 * @property int $tamanio
 * @property string $ruta
 * @property string|null $descripcion
 * @property int|null $usuario_id
 * @property bool|null $activo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Academia $academia
 * @property User|null $user
 *
 * @package App\Models
 */
class Archivo extends Model
{
	protected $table = 'archivos';

	protected $casts = [
		'academia_id' => 'int',
		'entidad_id' => 'int',
		'tamanio' => 'int',
		'usuario_id' => 'int',
		'activo' => 'bool'
	];

	protected $fillable = [
		'academia_id',
		'entidad_tipo',
		'entidad_id',
		'tipo',
		'nombre',
		'nombre_original',
		'extension',
		'mime_type',
		'tamanio',
		'ruta',
		'descripcion',
		'usuario_id',
		'activo'
	];

	public function academia()
	{
		return $this->belongsTo(Academia::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'usuario_id');
	}
}
