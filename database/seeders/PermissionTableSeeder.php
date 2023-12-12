<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           //'role-delete',
           /*'product-list',
           'product-create',
           'product-edit',
           'product-delete'*/
        ];
        
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }

        Permission::create(['name' => 'area-list']);
        Permission::create(['name' => 'area-create']);
        Permission::create(['name' => 'area-edit']);
        //Permission::create(['name' => 'area-delete']);


        //Admin mods
        Permission::create([
            'name' => 'contactos.index',
        ]);
        Permission::create([
            'name' => 'ubicaciones.index',
        ]);

        $usuario = Role::create(['name' => 'usuario']);


        //Permisos de área
        Permission::create([
            'name' => 'areas.index',
        ])->assignRole($usuario);


        //Gabinete médico
        $admingabinetemedico = Role::create(['name' => 'Administrador de gabinete médico']);

        Permission::create([
            'name' => 'gabinetemedico.index',
        ])->assignRole($admingabinetemedico);


        //Trámites
        $encargadodetramites = Role::create(['name' => 'Encargado de trámites']);

        Permission::create([
            'name' => 'categoriastramites.index',
        ])->assignRole($encargadodetramites);

        Permission::create([
            'name' => 'tramites.index',
        ])->assignRole($encargadodetramites);

        //Cajas
        $encargadodecajas = Role::create(['name' => 'Encargado de cajas']);
        Permission::create([
            'name' => 'cajas.index',
        ])->assignRole($encargadodecajas);

        //Nafs
        $encargadodenafs = Role::create(['name' => 'Encargado de Nafs']);
        Permission::create([
            'name' => 'nafs.index',
        ])->assignRole($encargadodenafs);

        //Cafetería
        $encargadodecafeteria = Role::create(['name' => 'Encargado de cafetería']);

        Permission::create([
            'name' => 'categoriasmenu.index',
        ])->assignRole($encargadodecafeteria);

        Permission::create([
            'name' => 'cafeteria.index',
        ])->assignRole($encargadodecafeteria);

        //Postgrados
        $encargadodepostgrados = Role::create(['name' => 'Encargado de Postgrados']);
        Permission::create([
            'name' => 'postgrados.index',
        ])->assignRole($encargadodepostgrados);

        //Bienestar
        $encargadodebienestar = Role::create(['name' => 'Encargado de Bienestar universitario']);
        Permission::create([
            'name' => 'bienestar.index',
        ])->assignRole($encargadodebienestar);

        //Direccion
        $encargadodedireccion = Role::create(['name' => 'Encargado de Direcciones de carrera']);
        Permission::create([
            'name' => 'direccion.index',
        ])->assignRole($encargadodedireccion);

        //Plataforma de atención
        $encargadopatencion = Role::create(['name' => 'Encargado de Plataforma de atención']);
        Permission::create([
            'name' => 'plataforma.index',
        ])->assignRole($encargadopatencion);

        //Biblioteca
        $encargadobiblioteca = Role::create(['name' => 'Encargado de Biblioteca']);
        Permission::create([
            'name' => 'biblioteca.index',
        ])->assignRole($encargadobiblioteca);

        //Campus deportivo
        $encargadocampus = Role::create(['name' => 'Encargado de Campus deportivo']);
        Permission::create([
            'name' => 'campus.index',
        ])->assignRole($encargadocampus);

        $user1 = User::create([
            'name' => 'Aydee Alanoca',
            'email' => 'a@univalle.edu',
            'password' => bcrypt('123456789'),
            'created_at' => '2023-12-12 04:53:21',
            'updated_at' => '2023-12-12 04:53:21',
        ]);

        $user1->assignRole($encargadodetramites);
        
        $user2 = User::create([
            'name' => 'Beto Benítez',
            'email' => 'b@univalle.edu',
            'password' => bcrypt('123456789'),
            'created_at' => '2023-12-12 05:00:00',
            'updated_at' => '2023-12-12 05:00:00',
        ]);

        $user2->assignRole($encargadodecajas);
        
        $user3 = User::create([
            'name' => 'Carlos Cruz',
            'email' => 'c@univalle.edu',
            'password' => bcrypt('123456789'),
            'created_at' => '2023-12-12 05:10:00',
            'updated_at' => '2023-12-12 05:10:00',
        ]);

        $user3->assignRole($encargadodenafs);
        
        $user4 = User::create([
            'name' => 'David Díaz',
            'email' => 'd@univalle.edu',
            'password' => bcrypt('123456789'),
            'created_at' => '2023-12-12 05:20:00',
            'updated_at' => '2023-12-12 05:20:00',
        ]);

        $user4->assignRole($encargadodecafeteria);
        
        $user5 = User::create([
            'name' => 'Elena Espinosa',
            'email' => 'e@univalle.edu',
            'password' => bcrypt('123456789'),
            'created_at' => '2023-12-12 05:30:00',
            'updated_at' => '2023-12-12 05:30:00',
        ]);
        $user5->assignRole($encargadodepostgrados);
        
        $user6 = User::create([
            'name' => 'Fabián Fernández',
            'email' => 'f@univalle.edu',
            'password' => bcrypt('123456789'),
            'created_at' => '2023-12-12 05:40:00',
            'updated_at' => '2023-12-12 05:40:00',
        ]);
        $user6->assignRole($encargadodebienestar);
        
        $user7 = User::create([
            'name' => 'Gabriela Gómez',
            'email' => 'g@univalle.edu',
            'password' => bcrypt('123456789'),
            'created_at' => '2023-12-12 05:50:00',
            'updated_at' => '2023-12-12 05:50:00',
        ]);
        $user7->assignRole($encargadodedireccion);
        
        $user8 = User::create([
            'name' => 'Héctor Herrera',
            'email' => 'h@univalle.edu',
            'password' => bcrypt('123456789'),
            'created_at' => '2023-12-12 06:00:00',
            'updated_at' => '2023-12-12 06:00:00',
        ]);
        $user8->assignRole($encargadopatencion);
        
        $user9 = User::create([
            'name' => 'Isabel Ibarra',
            'email' => 'i@univalle.edu',
            'password' => bcrypt('123456789'),
            'created_at' => '2023-12-12 06:10:00',
            'updated_at' => '2023-12-12 06:10:00',
        ]);
        $user9->assignRole($encargadobiblioteca);
        
        $user10 = User::create([
            'name' => 'Javier Jiménez',
            'email' => 'j@univalle.edu',
            'password' => bcrypt('123456789'),
            'created_at' => '2023-12-12 06:20:00',
            'updated_at' => '2023-12-12 06:20:00',
        ]);
        $user10->assignRole($encargadocampus);
        
        $user11 = User::create([
            'name' => 'Karla Martínez',
            'email' => 'k@univalle.edu',
            'password' => bcrypt('123456789'),
            'created_at' => '2023-12-12 06:30:00',
            'updated_at' => '2023-12-12 06:30:00',
        ]);
        $user11->assignRole($admingabinetemedico);
    }
}