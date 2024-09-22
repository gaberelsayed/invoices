<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'      => 'Mona Abdo',
            'email'     => 'monaabdo88@gmail.com',
            'password'  => bcrypt('12122005'),
            'roles_name' => ['Super Admin'],
            'status'    => '1'
        ]);
        $role = Role::create(['name'    => 'Super Admin']);
        $permission = Permission::pluck('id','id')->all();
        $role->syncPermissions($permission);
        $user->assignRole($role->id);
    }
}
