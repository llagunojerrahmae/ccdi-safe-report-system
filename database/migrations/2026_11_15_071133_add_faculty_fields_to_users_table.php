<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('role')->default('admin')->after('password');
        $table->string('faculty_id')->nullable()->unique()->after('email');
        $table->string('department')->nullable()->after('faculty_id');
        $table->string('status')->default('approved')->after('role');
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropUnique(['faculty_id']);
        $table->dropColumn(['role', 'faculty_id', 'department', 'status']);
    });
}
};
