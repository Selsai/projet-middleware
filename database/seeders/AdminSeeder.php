<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Créer la permission
        $permission = Permission::create(['name' => 'view dashboard']);
        
        // 2. Créer le rôle admin
        $role = Role::create(['name' => 'admin']);
        
        // 3. Assigner permission au rôle
        $role->givePermissionTo($permission);
        
        // 4. Assigner rôle à l'utilisateur test@example.com
        $user = User::where('email', 'test@example.com')->first();
        if ($user) {
            $user->assignRole('admin');
        }
    } 
}
