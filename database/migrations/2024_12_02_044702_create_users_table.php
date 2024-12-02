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
            $table->integer('id', true);
            $table->string('username')->unique('email');
            $table->string('password');
            $table->string('full_name');
            $table->integer('avatar')->nullable()->index('fk_users_avatar');
            $table->enum('gender', ['male', 'female', 'other', ''])->default('other');
            $table->enum('role', ['member', 'moder', 'admin', ''])->default('member');
            $table->string('token');
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->dateTime('name_updated_at')->useCurrent();

            
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
