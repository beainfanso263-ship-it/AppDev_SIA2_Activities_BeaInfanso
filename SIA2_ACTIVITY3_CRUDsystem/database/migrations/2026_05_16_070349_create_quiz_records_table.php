<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quiz_records', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('subject');
            $table->integer('quiz1');
            $table->integer('quiz2');
            $table->integer('total');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quiz_records');
    }
};