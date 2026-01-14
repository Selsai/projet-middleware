<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Créer la permission
        $permission = Permission::create(['name' => 'view dashboard']);
        
        // Créer le rôle
        $role = Role::create(['name' => 'admin']);
        
        // Assigner la permission au rôle
        $role->givePermissionTo($permission);
        
        // Trouver l'utilisateur avec le bon email
        $user = User::where('email', 'admin@example.com')->first();
        
        if ($user) {
            $user->assignRole('admin');
        }
    }
}