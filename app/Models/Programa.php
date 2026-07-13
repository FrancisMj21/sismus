<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Programa
 * 
 * @property int $id
 * @property int $especialidad_id
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property int|null $orden
 * @property bool|null $activo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Especialidade $especialidade
 * @property Collection|Grupo[] $grupos
 *
 * @package App\Models
 */
class Programa extends Model
{
	protected $table = 'programas';

	protected $casts = [
		'especialidad_id' => 'int',
		'orden' => 'int',
		'activo' => 'bool'
	];

	protected $fillable = [
		'especialidad_id',
		'nombre',
		'descripcion',
		'orden',
		'activo'
	];

	public function especialidade()
	{
		return $this->belongsTo(Especialidade::class, 'especialidad_id');
	}

	public function grupos()
	{
		return $this->hasMany(Grupo::class);
	}
}
