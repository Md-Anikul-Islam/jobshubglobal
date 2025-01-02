<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_bn')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->integer('join_category_id')->nullable();
            $table->string('address')->nullable();
            $table->string('tread_licence')->nullable();
            $table->string('profile')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('status')->default('active');
            $table->string('is_registration_by')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            //user extra field
            $table->string('father_name')->nullable();
            $table->string('father_name_bn')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_name_bn')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nationality_bn')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('nid')->nullable();
            $table->date('dob')->nullable();
            $table->string('cv')->nullable();
            $table->string('resume')->nullable();
            $table->string('address_bn')->nullable();
            $table->string('details')->nullable();
            $table->string('details_bn')->nullable();


            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
