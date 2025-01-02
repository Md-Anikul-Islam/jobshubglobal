<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            //For roll and permission
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            //For Role and permission
            'role-and-permission-list',

            //For Resource
            'resource-list',

            //For User
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            //For Slider
            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',

            //For Category
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',

            //For Location
            'location-list',
            'location-create',
            'location-edit',
            'location-delete',

            //For Review
            'review-list',
            'review-create',
            'review-edit',
            'review-delete',

            //For Job
            'job-list',
            'job-create',
            'job-edit',
            'job-delete',

            //For Company
            'company-list',
            'company-create',
            'company-edit',
            'company-delete',

            //For Training Manage
            'training-manage',
            //For Training
            'training-list',
            'training-create',
            'training-edit',
            'training-delete',
            //For Training Category
            'training-category-list',
            'training-category-create',
            'training-category-edit',
            'training-category-delete',

            //For Migration
            'migration-list',
            'migration-create',
            'migration-edit',
            'migration-delete',

            //For Company Under Posted Job
            'company-under-posted-job',
            'company-under-create-job',
            'company-under-edit-job',
            'company-under-delete-job',

            //Join Category
            'join-category-list',
            'join-category-create',
            'join-category-edit',
            'join-category-delete',

            //about Setting
            'about-list',

            //Site Setting
            'site-setting',

            //Dashboard
            'login-log-list',
            'cart-list',

            //For Education
            'education-list',
            'education-create',
            'education-edit',
            'education-delete',

            //For Experience
            'experience-list',
            'experience-create',
            'experience-edit',
            'experience-delete',

            //For Skill
            'skill-list',
            'skill-create',
            'skill-edit',
            'skill-delete',

            //Apply Job
            'user-account',
            'apply-job-list',

        ];
        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
