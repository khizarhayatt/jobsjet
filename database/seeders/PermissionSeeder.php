<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Define your permissions and insert them into the 'permissions' table
        $permissions = [
            ['name' => 'Create Post','guard_name'=>'web'],
            ['name' => 'Edit Post','guard_name'=>'web'],
            ['name' => 'Delete Post','guard_name'=>'web'],
            ['name' => 'Create Users','guard_name'=>'web'],
            ['name' => 'Edit Users','guard_name'=>'web'],
            ['name' => 'Delete Users','guard_name'=>'web'],
            ['name' => 'Create Roles','guard_name'=>'web'],
            ['name' => 'Edit Roles','guard_name'=>'web'],
            ['name' => 'Delete Roles','guard_name'=>'web'],
            ['name' => 'Create Permisions','guard_name'=>'web'],
            ['name' => 'Edit Permisions','guard_name'=>'web'],
            ['name' => 'Delete Permisions','guard_name'=>'web'],

        ];

        // Insert the permissions into the 'permissions' table
        DB::table('permissions')->insert($permissions);
    }
}