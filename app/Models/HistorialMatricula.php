<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HistorialMatricula
 * 
 * @property int $id
 * @property int $matricula_id
 * @property int $usuario_id
 * @property string $accion
 * @property string|null $detalle
 * @property Carbon|null $created_at
 * 
 * @property Matricula $matricula
 * @property User $user
 *
 * @package App\Models
 */
class HistorialMatricula extends Model
{
	protected $table = 'historial_matriculas';
	public $timestamps = false;

	protected $casts = [
		'matricula_id' => 'int',
		'usuario_id' => 'int'
	];

	protected $fillable = [
		'matricula_id',
		'usuario_id',
		'accion',
		'detalle'
	];

	public function matricula()
	{
		return $this->belongsTo(Matricula::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'usuario_id');
	}
}
