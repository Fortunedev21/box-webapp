<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list caisses']);
        Permission::create(['name' => 'view caisses']);
        Permission::create(['name' => 'create caisses']);
        Permission::create(['name' => 'update caisses']);
        Permission::create(['name' => 'delete caisses']);

        Permission::create(['name' => 'list communes']);
        Permission::create(['name' => 'view communes']);
        Permission::create(['name' => 'create communes']);
        Permission::create(['name' => 'update communes']);
        Permission::create(['name' => 'delete communes']);

        Permission::create(['name' => 'list departements']);
        Permission::create(['name' => 'view departements']);
        Permission::create(['name' => 'create departements']);
        Permission::create(['name' => 'update departements']);
        Permission::create(['name' => 'delete departements']);

        Permission::create(['name' => 'list frequences']);
        Permission::create(['name' => 'view frequences']);
        Permission::create(['name' => 'create frequences']);
        Permission::create(['name' => 'update frequences']);
        Permission::create(['name' => 'delete frequences']);

        Permission::create(['name' => 'list modepaiements']);
        Permission::create(['name' => 'view modepaiements']);
        Permission::create(['name' => 'create modepaiements']);
        Permission::create(['name' => 'update modepaiements']);
        Permission::create(['name' => 'delete modepaiements']);

        Permission::create(['name' => 'list structurefinancieres']);
        Permission::create(['name' => 'view structurefinancieres']);
        Permission::create(['name' => 'create structurefinancieres']);
        Permission::create(['name' => 'update structurefinancieres']);
        Permission::create(['name' => 'delete structurefinancieres']);

        Permission::create(['name' => 'list transactions']);
        Permission::create(['name' => 'view transactions']);
        Permission::create(['name' => 'create transactions']);
        Permission::create(['name' => 'update transactions']);
        Permission::create(['name' => 'delete transactions']);

        Permission::create(['name' => 'list typecaisses']);
        Permission::create(['name' => 'view typecaisses']);
        Permission::create(['name' => 'create typecaisses']);
        Permission::create(['name' => 'update typecaisses']);
        Permission::create(['name' => 'delete typecaisses']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list utilisateurs']);
        Permission::create(['name' => 'view utilisateurs']);
        Permission::create(['name' => 'create utilisateurs']);
        Permission::create(['name' => 'update utilisateurs']);
        Permission::create(['name' => 'delete utilisateurs']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $utilisateur = \App\Models\Utilisateur::whereEmail(
            'admin@admin.com'
        )->first();

        if ($utilisateur) {
            $utilisateur->assignRole($adminRole);
        }
    }
}
