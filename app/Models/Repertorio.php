<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Repertorio
 * 
 * @property int $id
 * @property int $matricula_id
 * @property int $profesor_id
 * @property int $especialidad_id
 * @property string $titulo
 * @property string|null $autor
 * @property string|null $tono
 * @property string|null $link_youtube
 * @property int|null $orden
 * @property string|null $estado
 * @property string|null $observaciones
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Especialidade $especialidade
 * @property Matricula $matricula
 * @property Profesore $profesore
 *
 * @package App\Models
 */
class Repertorio extends Model
{
	protected $table = 'repertorios';

	protected $casts = [
		'matricula_id' => 'int',
		'profesor_id' => 'int',
		'especialidad_id' => 'int',
		'orden' => 'int'
	];

	protected $fillable = [
		'matricula_id',
		'profesor_id',
		'especialidad_id',
		'titulo',
		'autor',
		'tono',
		'link_youtube',
		'orden',
		'estado',
		'observaciones'
	];

	public function especialidade()
	{
		return $this->belongsTo(Especialidade::class, 'especialidad_id');
	}

	public function matricula()
	{
		return $this->belongsTo(Matricula::class);
	}

	public function profesore()
	{
		return $this->belongsTo(Profesore::class, 'profesor_id');
	}
}
