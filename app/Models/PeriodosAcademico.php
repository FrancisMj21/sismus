<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PeriodosAcademico
 * 
 * @property int $id
 * @property int $academia_id
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property Carbon|null $fecha_inicio
 * @property Carbon|null $fecha_fin
 * @property bool|null $activo
 * @property bool|null $habilitado
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Academia $academia
 * @property Collection|Grupo[] $grupos
 *
 * @package App\Models
 */
class PeriodosAcademico extends Model
{
	protected $table = 'periodos_academicos';

	protected $casts = [
		'academia_id' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime',
		'activo' => 'bool',
		'habilitado' => 'bool'
	];

	protected $fillable = [
		'academia_id',
		'nombre',
		'descripcion',
		'fecha_inicio',
		'fecha_fin',
		'activo',
		'habilitado'
	];

	public function academia()
	{
		return $this->belongsTo(Academia::class);
	}

	public function grupos()
	{
		return $this->hasMany(Grupo::class, 'periodo_academico_id');
	}
}
