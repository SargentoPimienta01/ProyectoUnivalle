<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);

        $this->call(AreasTableSeeder::class);

        $this->call(UbicacionesSeeder::class);

        $this->call(CategoriaTramitesTableSeeder::class);
        $this->call(TramiteTableSeeder::class);
        $this->call(RequisitoTramiteTableSeeder::class);


        $this->call(CajaTableSeeder::class);
        $this->call(RequisitoCajaTableSeeder::class);

        $this->call(BibliotecasTableSeeder::class);

        $this->call(BienestarUniversitarioSeeder::class);
        $this->call(RequisitoBienestarSeeder::class);

        $this->call(DireccionCarreraSeeder::class);
        $this->call(ServicioDireccionSeeder::class);

        $this->call(CampusSeeder::class);

        $this->call(PostgradoSeeder::class);

        $this->call(PlataformaDeAtencionSeeder::class);

        $this->call(NafsTableSeeder::class);
        $this->call(RequisitoNafsTableSeeder::class);

        $this->call(GabineteMedicoTableSeeder::class);
        $this->call(RequisitosGabineteMedicoTableSeeder::class);

        $this->call(CategoriaMenuSeeder::class);
        $this->call(ProductosTableSeeder::class);
    }
}
