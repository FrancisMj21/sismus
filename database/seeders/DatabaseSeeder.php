<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            PermissionsSeeder::class,
            AcademiasSeeder::class,
            UsersSeeder::class,
            ConfiguracionSeeder::class,
            EspecialidadesSeeder::class,
            ProgramasSeeder::class,
            ProductosSeeder::class,
            DiasSemanaSeeder::class,
            FeriadosSeeder::class,
        ]);
    }
}
