<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Academia;

class AcademiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Academia::updateOrCreate(
            ['nombre' => 'Ad Libitum'],
            [
                'ruc'       => null,
                'telefono'  => null,
                'correo'    => 'contacto@adlibitum.com',
                'direccion' => null,
                'logo'      => null,
                'activo'    => true,
            ]
        );
    }
}
