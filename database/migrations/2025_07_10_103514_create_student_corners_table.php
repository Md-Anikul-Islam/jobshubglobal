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
        Schema::create('student_corners', function (Blueprint $table) {
            $table->id();
            $table->integer('student_corner_category_id')->nullable();
            $table->string('title');
            $table->date('date')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->longText('details')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_corners');
    }
};
