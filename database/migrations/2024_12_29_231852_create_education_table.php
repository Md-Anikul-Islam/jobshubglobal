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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('institute_name')->nullable();
            $table->string('institute_name_bn')->nullable();
            $table->string('degree_name')->nullable();
            $table->string('degree_name_bn')->nullable();
            $table->string('result');
            $table->integer('passing_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
