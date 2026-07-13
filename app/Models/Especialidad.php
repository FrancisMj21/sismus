<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Especialidade
 * 
 * @property int $id
 * @property int $academia_id
 * @property string $nombre
 * @property string|null $descripcion
 * @property bool|null $activo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Academia $academia
 * @property Collection|Horario[] $horarios
 * @property Collection|HorariosGenerale[] $horarios_generales
 * @property Collection|ProfesorEspecialidad[] $profesor_especialidades
 * @property Collection|Programa[] $programas
 * @property Collection|Repertorio[] $repertorios
 *
 * @package App\Models
 */
class Especialidad extends Model
{
	protected $table = 'especialidades';

	protected $casts = [
		'academia_id' => 'int',
		'activo' => 'bool'
	];

	protected $fillable = [
		'academia_id',
		'nombre',
		'descripcion',
		'activo'
	];

	public function academia()
	{
		return $this->belongsTo(Academia::class);
	}

	public function horarios()
	{
		return $this->hasMany(Horario::class, 'especialidad_id');
	}

	public function horarios_generales()
	{
		return $this->hasMany(HorariosGenerale::class, 'especialidad_id');
	}

	public function profesor_especialidades()
	{
		return $this->hasMany(ProfesorEspecialidade::class, 'especialidad_id');
	}

	public function programas()
	{
		return $this->hasMany(Programa::class, 'especialidad_id');
	}

	public function repertorios()
	{
		return $this->hasMany(Repertorio::class, 'especialidad_id');
	}
}
