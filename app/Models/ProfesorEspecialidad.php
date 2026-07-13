<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfesorEspecialidade
 * 
 * @property int $id
 * @property int $profesor_id
 * @property int $especialidad_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Profesore $profesore
 * @property Especialidade $especialidade
 *
 * @package App\Models
 */
class ProfesorEspecialidad extends Model
{
	protected $table = 'profesor_especialidades';

	protected $casts = [
		'profesor_id' => 'int',
		'especialidad_id' => 'int'
	];

	protected $fillable = [
		'profesor_id',
		'especialidad_id'
	];

	public function profesore()
	{
		return $this->belongsTo(Profesore::class, 'profesor_id');
	}

	public function especialidade()
	{
		return $this->belongsTo(Especialidade::class, 'especialidad_id');
	}
}
