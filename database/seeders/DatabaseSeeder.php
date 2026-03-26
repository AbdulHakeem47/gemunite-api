<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
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
        // User::factory(10)->create();
        $roles = [
            'admin','buyer', 'seller','buyer_agent', 'service_provider'
        ];

        $adminRoleId = null;

        foreach($roles as $role){
            $roleId = Role::create([ 'name' => $role,]);
            if($role === 'admin') $adminRoleId = $roleId->id;
        }

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'active_role_id'=> $adminRoleId
        ]);
        
        UserRole::create([
            "user_id"=> $user->id,
            "role_id"=> $adminRoleId,
            "verified_at"=>now()
        ]);

    }
}
