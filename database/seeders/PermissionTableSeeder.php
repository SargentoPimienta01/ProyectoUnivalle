<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
  
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
           'role-delete',
           'product-list',
           'product-create',
           'product-edit',
           'product-delete'
        ];
        
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }

        Permission::create(['name' => 'area-list']);
        Permission::create(['name' => 'area-create']);
        Permission::create(['name' => 'area-edit']);
        Permission::create(['name' => 'area-delete']);


        $usuario = Role::create(['name' => 'usuario']);


        //Permisos de área
        Permission::create([
            'name' => 'areas.index',
        ])->assignRole($usuario);
    }
}