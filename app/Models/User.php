<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    protected $fillable = [
        'name',
        'name_bn',
        'email',
        'join_category_id',
        'password',
        'is_registration_by',
        'phone',
        'address',
        'tread_licence',
        'profile',
        'email_verified_at',
        'verification_code',
        'status',

        //user extra field
        'father_name',
        'father_name_bn',
        'mother_name',
        'mother_name_bn',
        'nationality',
        'nationality_bn',
        'blood_group',
        'nid',
        'dob',
        'cv',
        'resume',
        'address',
        'address_bn',

    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'password' => 'hashed',
    ];
}
