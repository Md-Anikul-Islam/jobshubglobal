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


            //subscription
            'subscription-list',
            'subscription-create',
            'subscription-edit',
            'subscription-delete',



            //For Menu
            'menu-list',
            'menu-create',
            'menu-edit',
            'menu-delete',

            //For Category
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',

            //For Expense Category
            'expense-category-list',
            'expense-category-create',
            'expense-category-edit',
            'expense-category-delete',

            //For Expense
            'expense-list',
            'expense-create',
            'expense-edit',
            'expense-delete',

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

            //Migration Category
            'migration-category-list',
            'migration-category-create',
            'migration-category-edit',
            'migration-category-delete',

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

            //Country
            'country-list',
            'country-create',
            'country-edit',
            'country-delete',

            //For Tender
            'tender-list',
            'tender-create',
            'tender-edit',
            'tender-delete',

            //advisement
            'advisement-list',
            'advisement-create',
            'advisement-edit',
            'advisement-delete',

            //Apply Job
            'user-account',
            'apply-job-list',

            //Fair
            'fair-join-user-list',


             //For Subscription Plan
            'purchased-subscription-list',
            'purchased-learning-list',
            'purchased-training-list',


            //For eLearning Category
            'eLearning-manage',
            'eLearning-category-list',
            'eLearning-category-create',
            'eLearning-category-edit',
            'eLearning-category-delete',

            //Student Corner Category
            'student-corner-category-list',
            'student-corner-category-create',
            'student-corner-category-edit',
            'student-corner-category-delete',

            //Student Corner
            'student-corner-manage',
            'student-corner-list',
            'student-corner-create',
            'student-corner-edit',
            'student-corner-delete',


            'eLearning-list',
            'eLearning-create',
            'eLearning-edit',
            'eLearning-delete',

            'migration-manage',

            'account-manage',

            'elearning-income-list',
            'elearning-income-delete',


            'subscription-income-list',
            'subscription-income-delete',

            'training-income-list',
            'training-income-delete',






        ];
        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
