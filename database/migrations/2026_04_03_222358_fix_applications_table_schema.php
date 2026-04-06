<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('applications', 'user_id')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            });
        }

        if (!Schema::hasColumn('applications', 'phone')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->string('phone')->nullable();
            });
        }

        if (!Schema::hasColumn('applications', 'address')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->string('address')->nullable();
            });
        }

        if (!Schema::hasColumn('applications', 'date_of_birth')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->date('date_of_birth')->nullable();
            });
        }

        if (!Schema::hasColumn('applications', 'gender')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->string('gender')->nullable();
            });
        }

        if (!Schema::hasColumn('applications', 'institution')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->string('institution')->nullable();
            });
        }

        if (!Schema::hasColumn('applications', 'department')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->string('department')->nullable();
            });
        }

        if (!Schema::hasColumn('applications', 'semester')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->string('semester')->nullable();
            });
        }

        if (!Schema::hasColumn('applications', 'skills')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->text('skills')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            if (Schema::hasColumn('applications', 'user_id')) {
                $table->dropConstrainedForeignId('user_id');
            }

            foreach ([
                'phone',
                'address',
                'date_of_birth',
                'gender',
                'institution',
                'department',
                'semester',
                'skills',
            ] as $column) {
                if (Schema::hasColumn('applications', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};