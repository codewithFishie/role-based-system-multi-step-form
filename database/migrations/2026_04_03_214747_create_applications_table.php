<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Step 1s
            $table->string('phone');
            $table->string('address');
            $table->date('date_of_birth');
            $table->string('gender');

            // Step 2
            $table->string('institution');
            $table->string('department');
            $table->string('semester');

            // Step 3
            $table->text('skills')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};