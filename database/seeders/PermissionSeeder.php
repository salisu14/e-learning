<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

use App\Enums\UserRoleEnum as Role;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'user_manage',
            ],
            [
                'name' => 'role_manage',
            ],
            [
                'name' => 'role_edit',
            ],
            [
                'name' => 'role_show',
            ],
            [
                'name' => 'course_create',
            ],
            [
                'name' => 'course_read',
            ],
            [
                'name' => 'course_update',
            ],
            [
                'name' => 'course_delete',
            ],
            [
                'name' => 'department_create',
            ],
            [
                'name' => 'department_read',
            ],
            [
                'name' => 'department_update',
            ],
            [
                'name' => 'department_delete',
            ],
            [
                'name' => 'enrollment_create',
            ],
            [
                'name' => 'enrollment_read',
            ],
            [
                'name' => 'enrollment_update',
            ],
            [
                'name' => 'enrollment_delete',
            ],
            [
                'name' => 'allocation_create',
            ],
            [
                'name' => 'allocation_read',
            ],
            [
                'name' => 'allocation_update',
            ],
            [
                'name' => 'allocation_delete',
            ],
            [
                'name' => 'session_create',
            ],
            [
                'name' => 'session_read',
            ],
            [
                'name' => 'session_update',
            ],
            [
                'name' => 'session_delete',
            ],
            [
                'name' => 'lesson_create',
            ],
            [
                'name' => 'lesson_read',
            ],
            [
                'name' => 'lesson_update',
            ],
            [
                'name' => 'lesson_delete',
            ],
        ];
    
        foreach ($permissions as $permissionData) {
            Permission::firstOrCreate([
                'name' => $permissionData['name'],
                'guard_name' => 'web',
            ]);
        }
    }
}
